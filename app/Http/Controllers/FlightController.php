<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    /**
     * Flight list
     */
    public function flightList(){
        $all_data = Flight::with('entry')->where('flight_date', null)->where('flight_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('flight.all_flight', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Flight Pending list
     */
    public function flightPendingList(){
        $all_data = Flight::with('entry')->where('flight_date', '!=', null)->where('flight_report', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('flight.all_pending_flight', [
            'all_data' => $all_data
        ]);
    }
    /**
     * Flight Done list
     */
    public function flightDoneList(){
        $all_data = Flight::with('entry')->where('flight_date', '!=', null)->where('flight_report', '!=', null)->where('status', 0)->latest()->get();
        // dd($all_data);
        return view('flight.all_done_flight', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Flight Create Page
     */
    public function flightCreate(){
        return view('flight.create_flight');
    }

    /**
     * Flight Store
     */
    public function flightStore(Request $request){
        $this->validate($request, [
            'man_id' => 'required'
        ]);

        // return $request->all();
        Flight::create([
            'user_id' => Auth::user()->id,
            'man_id' => $request->man_id,
            'flight_date' => $request->flight_date,
            'flight_report' => $request->flight_report,
        ]);

        $notification = [
            'message' => 'Flight added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('flight.list')->with($notification);
    }

    /**
     * Flight Page
     */
    public function flightEdit($id){
        $data = Flight::findOrFail($id);
        return view('flight.edit_flight', [
            'data' => $data
        ]);
    }

    /**
     * Flight Update
     */
    public function flightUpdate(Request $request, $id){

        $data = Flight::findOrFail($id);

        $data->user_id = Auth::user()->id;
        $data->man_id = $request->man_id;
        $data->flight_date = $request->flight_date;
        $data->flight_report = $request->flight_report;
        $data->update();

        $notification = [
            'message' => 'Flight updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('flight.list')->with($notification);

    }

    /**
     * Flight Status Done
     */
    public function flightStatus($id){
        $data = Flight::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Flight status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('flight.done.list')->with($notification);
    }

    /**
     * Flight Delete
     */
    public function flightDelete($id){
        Flight::findOrFail($id)->delete();

        $notification = [
            'message' => 'Flight trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('flight.list')->with($notification);
    }

    /**
     * Flight Trash list
     */
    public function flightTrashList(){
        $all_data = Flight::onlyTrashed()->where('status', 0)->latest()->get();
        return view('flight.trash_flight', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Flight Trash Recover
     */
    public function flightRecover($id){
        Flight::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Flight recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('flight.list')->with($notification);
    }

    /**
     * Flight Permanent Delete
     */
    public function flightPermanentDelete($id){

        Flight::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Flight permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('flight.list')->with($notification);

    }
}
