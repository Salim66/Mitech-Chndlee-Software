<?php

namespace App\Http\Controllers;

use App\Models\TestMedical;
use Illuminate\Http\Request;

class TestMedicalController extends Controller
{
    /**
     * Test Mediacl list
     */
    public function tMedicalList(){
        $all_data = TestMedical::where('medical_attend_date', null)->where('report_delivery_date', null)->where('medical_report_status', null)->where('status', 0)->latest()->get();
        return view('test-medical.all_tMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Test Mediacl Pending list
     */
    public function tMedicalPendingList(){
        $all_data = TestMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', null)->where('status', 0)->latest()->get();
        return view('test-medical.all_pending_tMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Test Mediacl Done list
     */
    public function tMedicalDoneList(){
        $all_data = TestMedical::where('medical_attend_date', '!=', null)->where('report_delivery_date', '!=', null)->where('medical_report_status', '!=', null)->where('status', 0)->latest()->get();
        return view('test-medical.all_done_tMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Test Medical Create Page
     */
    public function tMedicalCreate(){
        return view('test-medical.create_tMedical');
    }

    /**
     * Test Medical Store
     */
    public function tMedicalStore(Request $request){
        $this->validate($request, [
            'entry_passport_id' => 'required'
        ]);

        // return $request->all();
        TestMedical::create([
            'entry_passport_id' => $request->entry_passport_id,
            'medical_attend_date' => $request->medical_attend_date,
            'report_delivery_date' => $request->report_delivery_date,
            'medical_report_status' => $request->medical_report_status,
        ]);

        $notification = [
            'message' => 'Test medical added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tMedical.list')->with($notification);
    }

    /**
     * Edit Test Medical Page
     */
    public function tMedicalEdit($id){
        $data = TestMedical::findOrFail($id);
        return view('test-medical.edit_tMedical', [
            'data' => $data
        ]);
    }

    /**
     * Update Test Medical
     */
    public function tMedicalUpdate(Request $request, $id){

        $data = TestMedical::findOrFail($id);

        $data->entry_passport_id = $request->entry_passport_id;
        $data->medical_attend_date = $request->medical_attend_date;
        $data->report_delivery_date = $request->report_delivery_date;
        $data->medical_report_status = $request->medical_report_status;
        $data->update();

        $notification = [
            'message' => 'Test medical updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('tMedical.list')->with($notification);

    }

    /**
     * test Medical Status Done
     */
    public function tMedicalStatus($id){
        $data = TestMedical::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Test medical status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('tMedical.list')->with($notification);
    }

    /**
     * Test medical Delete
     */
    public function tMedicalDelete($id){
        TestMedical::findOrFail($id)->delete();

        $notification = [
            'message' => 'Test medical trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('tMedical.list')->with($notification);
    }

    /**
     * Test medical Trash list
     */
    public function tMedicalTrashList(){
        $all_data = TestMedical::onlyTrashed()->where('status', 0)->latest()->get();
        return view('test-medical.trash_tMedical', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Test medical Trash Recover
     */
    public function tMedicalRecover($id){
        TestMedical::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Test medical recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tMedical.list')->with($notification);
    }

    /**
     * Test medical Permanent Delete
     */
    public function tMedicalPermanentDelete($id){

        TestMedical::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Test medical permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('tMedical.list')->with($notification);

    }
}
