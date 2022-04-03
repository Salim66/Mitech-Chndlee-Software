<?php

namespace App\Http\Controllers;

use App\Models\TranCerti;
use Illuminate\Http\Request;

class TranCertiController extends Controller
{
    /**
     * Training list
     */
    public function tranList(){
        $all_data = TranCerti::with('entry')->where('tran_date', null)->where('tran_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('tran.all_tran', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Training Pending list
     */
    public function tranPendingList(){
        $all_data = TranCerti::with('entry')->where('tran_date', '!=', null)->where('tran_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('tran.all_pending_tran', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Training Done list
     */
    public function tranDoneList(){
        $all_data = TranCerti::with('entry')->where('tran_date', '!=', null)->where('tran_report', '!=', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('tran.all_done_tran', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Training Create Page
     */
    public function tranCreate(){
        return view('tran.create_tran');
    }

    /**
     * Training Store
     */
    public function tranStore(Request $request){
        $this->validate($request, [
            'visa_id' => 'required'
        ]);

        // return $request->all();
        TranCerti::create([
            'visa_id' => $request->visa_id,
            'tran_date' => $request->tran_date,
            'tran_report' => $request->tran_report,
        ]);

        $notification = [
            'message' => 'Training Certificate added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tran.list')->with($notification);
    }

    /**
     * Training Page
     */
    public function tranEdit($id){
        $data = TranCerti::findOrFail($id);
        return view('tran.edit_tran', [
            'data' => $data
        ]);
    }

    /**
     * Training Update
     */
    public function tranUpdate(Request $request, $id){

        $data = TranCerti::findOrFail($id);

        $data->visa_id = $request->visa_id;
        $data->tran_date = $request->tran_date;
        $data->tran_report = $request->tran_report;
        $data->update();

        $notification = [
            'message' => 'Training Certificate updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('tran.list')->with($notification);

    }

    /**
     * Training Status Done
     */
    public function tranStatus($id){
        $data = TranCerti::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Training Certificate status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('tran.done.list')->with($notification);
    }

    /**
     * Training Delete
     */
    public function tranDelete($id){
        TranCerti::findOrFail($id)->delete();

        $notification = [
            'message' => 'Training Certificate trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('tran.list')->with($notification);
    }

    /**
     * Training Trash list
     */
    public function tranTrashList(){
        $all_data = TranCerti::onlyTrashed()->where('status', 0)->latest()->get();
        return view('tran.trash_tran', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Training Trash Recover
     */
    public function tranRecover($id){
        TranCerti::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Training Certificate recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tran.list')->with($notification);
    }

    /**
     * Training Permanent Delete
     */
    public function tranPermanentDelete($id){

        TranCerti::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Training Certificate deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tran.list')->with($notification);

    }
}
