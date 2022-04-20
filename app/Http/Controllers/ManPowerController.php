<?php

namespace App\Http\Controllers;

use App\Models\ManPower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManPowerController extends Controller
{
    /**
     * Man list
     */
    public function manList(){
        $all_data = ManPower::with('entry')->where('man_date', null)->where('man_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('man.all_man', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Man Pending list
     */
    public function manPendingList(){
        $all_data = ManPower::with('entry')->where('man_date', '!=', null)->where('man_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('man.all_pending_man', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Man Done list
     */
    public function manDoneList(){
        $all_data = ManPower::with('entry')->where('man_date', '!=', null)->where('man_report', '!=', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('man.all_done_man', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Man Create Page
     */
    public function manCreate(){
        return view('man.create_man');
    }

    /**
     * Man Store
     */
    public function manStore(Request $request){
        $this->validate($request, [
            'visa_id' => 'required'
        ]);

        // return $request->all();
        ManPower::create([
            'user_id' => Auth::user()->id,
            'visa_id' => $request->visa_id,
            'man_date' => $request->man_date,
            'man_report' => $request->man_report,
        ]);

        $notification = [
            'message' => 'Man Power added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('man.list')->with($notification);
    }

    /**
     * Man Page
     */
    public function manEdit($id){
        $data = ManPower::findOrFail($id);
        return view('man.edit_man', [
            'data' => $data
        ]);
    }

    /**
     * Man Update
     */
    public function manUpdate(Request $request, $id){

        $data = ManPower::findOrFail($id);

        $data->user_id = Auth::user()->id;
        $data->visa_id = $request->visa_id;
        $data->man_date = $request->man_date;
        $data->man_report = $request->man_report;
        $data->update();

        $notification = [
            'message' => 'Man Power updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('man.list')->with($notification);

    }

    /**
     * Man Status Done
     */
    public function manStatus($id){
        $data = ManPower::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Man power status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('man.done.list')->with($notification);
    }

    /**
     * Man Delete
     */
    public function manDelete($id){
        ManPower::findOrFail($id)->delete();

        $notification = [
            'message' => 'Man power trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('man.list')->with($notification);
    }

    /**
     * Man Trash list
     */
    public function manTrashList(){
        $all_data = ManPower::onlyTrashed()->where('status', 0)->latest()->get();
        return view('man.trash_man', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Man Trash Recover
     */
    public function manRecover($id){
        ManPower::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Man power recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('man.list')->with($notification);
    }

    /**
     * Man Permanent Delete
     */
    public function manPermanentDelete($id){

        ManPower::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Man Power permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('man.list')->with($notification);

    }
}
