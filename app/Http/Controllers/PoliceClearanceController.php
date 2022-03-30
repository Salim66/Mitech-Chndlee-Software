<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoliceClearance;

class PoliceClearanceController extends Controller
{
    /**
     * Police Clearance list
     */
    public function pClearanceList(){
        $all_data = PoliceClearance::with('entry')->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('police-clearance.all_pClearance', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Police Clearance Create Page
     */
    public function pClearanceCreate(){
        return view('police-clearance.create_pClearance');
    }

    /**
     * Police Clearance Store
     */
    public function pClearanceStore(Request $request){
        $this->validate($request, [
            'final_medical_id' => 'required',
            'police_clearance_date' => 'required',
            'police_clearance_report' => 'required',
        ]);

        // return $request->all();
        PoliceClearance::create([
            'final_medical_id' => $request->final_medical_id,
            'police_clearance_date' => $request->police_clearance_date,
            'police_clearance_report' => $request->police_clearance_report,
        ]);

        $notification = [
            'message' => 'Police clearance added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('pClearance.list')->with($notification);
    }

    /**
     * Police Clearance Medical Page
     */
    public function pClearanceEdit($id){
        $data = PoliceClearance::findOrFail($id);
        return view('police-clearance.edit_pClearance', [
            'data' => $data
        ]);
    }

    /**
     * Police Clearance Medical
     */
    public function pClearanceUpdate(Request $request, $id){

        $data = PoliceClearance::findOrFail($id);

        $data->final_medical_id = $request->final_medical_id;
        $data->police_clearance_date = $request->police_clearance_date;
        $data->police_clearance_report = $request->police_clearance_report;
        $data->update();

        $notification = [
            'message' => 'Police Clearance updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('pClearance.list')->with($notification);

    }

    /**
     * Police Clearance Status Done
     */
    public function pClearanceStatus($id){
        $data = PoliceClearance::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Police Clearance status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('pClearance.list')->with($notification);
    }

    /**
     * Police Clearance Delete
     */
    public function pClearanceDelete($id){
        PoliceClearance::findOrFail($id)->delete();

        $notification = [
            'message' => 'Police clearance trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('pClearance.list')->with($notification);
    }

    /**
     * Police Clearance Trash list
     */
    public function pClearanceTrashList(){
        $all_data = PoliceClearance::onlyTrashed()->where('status', 0)->latest()->get();
        return view('police-clearance.trash_pClearance', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Police Clearance Trash Recover
     */
    public function pClearanceRecover($id){
        PoliceClearance::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Police clearance recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('pClearance.list')->with($notification);
    }

    /**
     * Police Clearance Permanent Delete
     */
    public function pClearancePermanentDelete($id){

        PoliceClearance::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Police clearance permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('pClearance.list')->with($notification);

    }
}
