<?php

namespace App\Http\Controllers;

use App\Models\Processing;
use Illuminate\Http\Request;

class ProcessingController extends Controller
{
    /**
     * Processing media list
     */
    public function processingList(){
        $all_data = Processing::all();
        // dd($all_data);
        return view('processing.all_processing', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Processing Create Page
     */
    public function processingCreate(){
        return view('processing.create_processing');
    }

    /**
     * Processing Store
     */
    public function processingStore(Request $request){
        $this->validate($request, [
            'processing_media_name' => 'required|unique:processings,processing_media_name'
        ]);


        Processing::create([
            'processing_media_name' => $request->processing_media_name
        ]);

        $notification = [
            'message' => 'Processing added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('processing.list')->with($notification);
    }

    /**
     * Edit Processing Page
     */
    public function processingEdit($id){
        $data = Processing::findOrFail($id);
        return view('processing.edit_processing', [
            'data' => $data
        ]);
    }

    /**
     * Update Processing
     */
    public function processingUpdate(Request $request, $id){

        $data = Processing::findOrFail($id);

        $data->processing_media_name = $request->processing_media_name;
        $data->update();

        $notification = [
            'message' => 'Processing updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('processing.list')->with($notification);

    }

    /**
     * Processing Delete
     */
    public function processingDelete($id){
        Processing::findOrFail($id)->delete();

        $notification = [
            'message' => 'Processing trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('processing.list')->with($notification);
    }

    /**
     * Processing Trash list
     */
    public function processingTrashList(){
        $all_data = Processing::onlyTrashed()->latest()->get();
        return view('processing.trash_processing', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Processing Trash Recover
     */
    public function processingRecover($id){
        Processing::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Processing recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('processing.list')->with($notification);
    }

    /**
     * Processing Permanent Delete
     */
    public function processingPermanentDelete($id){

        Processing::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Processing permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('processing.list')->with($notification);

    }
}
