<?php

namespace App\Http\Controllers;

use App\Models\Mofa;
use Illuminate\Http\Request;

class MofaController extends Controller
{
    /**
     * Mofa list
     */
    public function mofaList(){
        $all_data = Mofa::with('entry')->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('mofa.all_mofa', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Mofa Create Page
     */
    public function mofaCreate(){
        return view('mofa.create_mofa');
    }

    /**
     * Mofa Store
     */
    public function mofaStore(Request $request){
        $this->validate($request, [
            'police_clearance_id' => 'required',
            'mofa_date' => 'required',
            'mofa_report' => 'required',
        ]);

        // return $request->all();
        Mofa::create([
            'police_clearance_id' => $request->police_clearance_id,
            'mofa_date' => $request->mofa_date,
            'mofa_report' => $request->mofa_report,
        ]);

        $notification = [
            'message' => 'Mofa added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('mofa.list')->with($notification);
    }

    /**
     * Mofa Page
     */
    public function mofaEdit($id){
        $data = Mofa::findOrFail($id);
        return view('mofa.edit_mofa', [
            'data' => $data
        ]);
    }

    /**
     * Mofa Medical
     */
    public function mofaUpdate(Request $request, $id){

        $data = Mofa::findOrFail($id);

        $data->police_clearance_id = $request->police_clearance_id;
        $data->mofa_date = $request->mofa_date;
        $data->mofa_report = $request->mofa_report;
        $data->update();

        $notification = [
            'message' => 'Mofa updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('mofa.list')->with($notification);

    }

    /**
     * Mofa Status Done
     */
    public function mofaStatus($id){
        $data = Mofa::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Mofa status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('mofa.list')->with($notification);
    }

    /**
     * Mofa Delete
     */
    public function mofaDelete($id){
        Mofa::findOrFail($id)->delete();

        $notification = [
            'message' => 'Mofa trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('mofa.list')->with($notification);
    }

    /**
     * Mofa Trash list
     */
    public function mofaTrashList(){
        $all_data = Mofa::onlyTrashed()->where('status', 0)->latest()->get();
        return view('mofa.trash_mofa', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Mofa Trash Recover
     */
    public function mofaRecover($id){
        Mofa::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Mofa recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('mofa.list')->with($notification);
    }

    /**
     * Mofa Permanent Delete
     */
    public function mofaPermanentDelete($id){

        Mofa::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Mofa permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('mofa.list')->with($notification);

    }
}
