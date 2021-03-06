<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisaController extends Controller
{
    /**
     * Visa list
     */
    public function visaList(){
        $all_data = Visa::with('entry')->where('visa_date', null)->where('visa_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('visa.all_visa', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Visa Pending list
     */
    public function visaPendingList(){
        $all_data = Visa::with('entry')->where('visa_date', '!=', null)->where('visa_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('visa.all_pending_visa', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Visa Done list
     */
    public function visaDoneList(){
        $all_data = Visa::with('entry')->where('visa_date', '!=', null)->where('visa_report', '!=', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('visa.all_done_visa', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Visa Create Page
     */
    public function visaCreate(){
        return view('visa.create_visa');
    }

    /**
     * Visa Store
     */
    public function visaStore(Request $request){
        $this->validate($request, [
            'tran_id' => 'required'
        ]);

        // return $request->all();
        Visa::create([
            'user_id' => Auth::user()->id,
            'tran_id' => $request->tran_id,
            'visa_date' => $request->visa_date,
            'visa_report' => $request->visa_report,
        ]);

        $notification = [
            'message' => 'Visa added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('visa.list')->with($notification);
    }

    /**
     * Visa Page
     */
    public function visaEdit($id){
        $data = Visa::findOrFail($id);
        return view('visa.edit_visa', [
            'data' => $data
        ]);
    }

    /**
     * Visa Update
     */
    public function visaUpdate(Request $request, $id){

        $data = Visa::findOrFail($id);

        $data->user_id = Auth::user()->id;
        $data->tran_id = $request->tran_id;
        $data->visa_date = $request->visa_date;
        $data->visa_report = $request->visa_report;
        $data->update();

        $notification = [
            'message' => 'Visa updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('visa.list')->with($notification);

    }

    /**
     * Visa Status Done
     */
    public function visaStatus($id){
        $data = Visa::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Visa status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('visa.done.list')->with($notification);
    }

    /**
     * Visa Delete
     */
    public function visaDelete($id){
        Visa::findOrFail($id)->delete();

        $notification = [
            'message' => 'Visa trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('visa.list')->with($notification);
    }

    /**
     * Visa Trash list
     */
    public function visaTrashList(){
        $all_data = Visa::onlyTrashed()->where('status', 0)->latest()->get();
        return view('visa.trash_visa', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Visa Trash Recover
     */
    public function visaRecover($id){
        Visa::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Visa recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('visa.list')->with($notification);
    }

    /**
     * Visa Permanent Delete
     */
    public function visaPermanentDelete($id){

        Visa::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Visa permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('visa.list')->with($notification);

    }
}
