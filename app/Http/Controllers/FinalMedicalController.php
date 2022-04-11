<?php

namespace App\Http\Controllers;

use App\Models\FinalMedical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalMedicalController extends Controller
{
    /**
     * Final Mediacl list
     */
    public function fMedicalList(){
        $all_data = FinalMedical::with('entry')->where('medical_attend_date', null)->where('report_delivery_date', null)->where('medical_report_status', null)->where('user_id', Auth::user()->id)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('final-medical.all_fMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Final Mediacl pending list
     */
    public function fMedicalPendingList(){
        $all_data = FinalMedical::with('entry')->where('medical_report_status', null)->where('user_id', Auth::user()->id)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('final-medical.all_pending_fMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Final Mediacl Done list
     */
    public function fMedicalDoneList(){
        $all_data = FinalMedical::with('entry')->where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', '!=', null)->where('user_id', Auth::user()->id)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('final-medical.all_done_fMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Final Medical Create Page
     */
    public function fMedicalCreate(){
        return view('final-medical.create_fMedical');
    }

    /**
     * Final Medical Store
     */
    public function fMedicalStore(Request $request){
        $this->validate($request, [
            'test_medical_id' => 'required'
        ]);

        // return $request->all();
        FinalMedical::create([
            'user_id' => Auth::user()->id,
            'test_medical_id' => $request->test_medical_id,
            'medical_attend_date' => $request->medical_attend_date,
            'report_delivery_date' => $request->report_delivery_date,
            'medical_report_status' => $request->medical_report_status,
        ]);

        $notification = [
            'message' => 'Final medical added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('fMedical.list')->with($notification);
    }

    /**
     * Edit Final Medical Page
     */
    public function fMedicalEdit($id){
        $data = FinalMedical::findOrFail($id);
        return view('final-medical.edit_fMedical', [
            'data' => $data
        ]);
    }

    /**
     * Update Final Medical
     */
    public function fMedicalUpdate(Request $request, $id){

        $data = FinalMedical::findOrFail($id);

        $data->user_id = Auth::user()->id;
        $data->test_medical_id = $request->test_medical_id;
        $data->medical_attend_date = $request->medical_attend_date;
        $data->report_delivery_date = $request->report_delivery_date;
        $data->medical_report_status = $request->medical_report_status;
        $data->update();

        $notification = [
            'message' => 'Final medical updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('fMedical.list')->with($notification);

    }

    /**
     * Final Medical Status Done
     */
    public function fMedicalStatus($id){
        $data = FinalMedical::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Final medical status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('fMedical.done.list')->with($notification);
    }

    /**
     * Final medical Delete
     */
    public function fMedicalDelete($id){
        FinalMedical::findOrFail($id)->delete();

        $notification = [
            'message' => 'Final medical trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('fMedical.list')->with($notification);
    }

    /**
     * Final medical Trash list
     */
    public function fMedicalTrashList(){
        $all_data = FinalMedical::onlyTrashed()->where('user_id', Auth::user()->id)->where('status', 0)->latest()->get();
        return view('final-medical.trash_fMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Final medical Trash Recover
     */
    public function fMedicalRecover($id){
        FinalMedical::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Final medical recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('fMedical.list')->with($notification);
    }

    /**
     * Final medical Permanent Delete
     */
    public function fMedicalPermanentDelete($id){

        FinalMedical::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Final medical permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('fMedical.list')->with($notification);

    }
}
