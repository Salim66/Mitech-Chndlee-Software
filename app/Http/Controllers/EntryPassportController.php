<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntryPassport;

class EntryPassportController extends Controller
{
 /**
     * Passport list
     */
    public function passportList(){
        $all_data = EntryPassport::with('agents')->where('status', 0)->latest()->get();
        return view('passport.all_passport', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Passport Create Page
     */
    public function passportCreate(){
        return view('passport.create_passport');
    }

    /**
     * Passport Store
     */
    public function passportStore(Request $request){
        $this->validate($request, [
            'date' => 'required',
            'name' => 'required',
            'passport_no' => 'required',
            'mobile_no' => 'required',
            'visa_type' => 'required',
            'agent_id' => 'required',
        ]);


        EntryPassport::create([
            'date' => $request->date,
            'name' => $request->name,
            'passport_no' => $request->passport_no,
            'mobile_no' => $request->mobile_no,
            'visa_type' => $request->visa_type,
            'agent_id' => $request->agent_id,
        ]);

        $notification = [
            'message' => 'Entry passport added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('passport.list')->with($notification);
    }

    /**
     * Edit Passport Page
     */
    public function passportEdit($id){
        $data = EntryPassport::findOrFail($id);
        return view('passport.edit_passport', [
            'data' => $data
        ]);
    }

    /**
     * Update Passport
     */
    public function passportUpdate(Request $request, $id){

        $data = EntryPassport::findOrFail($id);

        $data->date = $request->date;
        $data->name = $request->name;
        $data->passport_no = $request->passport_no;
        $data->mobile_no = $request->mobile_no;
        $data->visa_type = $request->visa_type;
        $data->agent_id = $request->agent_id;
        $data->update();

        $notification = [
            'message' => 'Entry passport updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('passport.list')->with($notification);

    }

    /**
     * Passport Status Done
     */
    public function passportStatus($id){
        $data = EntryPassport::findOrFail($id);

        if($data){
            $data->status = 1;
            $data->update();
        }

        $notification = [
            'message' => 'Entry passport status Done',
            'alert-type' => 'warning',
        ];

        return redirect()->route('passport.list')->with($notification);
    }

    /**
     * Passport Delete
     */
    public function passportDelete($id){
        EntryPassport::findOrFail($id)->delete();

        $notification = [
            'message' => 'Entry passport trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('passport.list')->with($notification);
    }

    /**
     * Password Trash list
     */
    public function passportTrashList(){
        $all_data = EntryPassport::onlyTrashed()->where('status', 0)->latest()->get();
        return view('passport.trash_passport', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Passport Trash Recover
     */
    public function passportRecover($id){
        EntryPassport::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Entry passport recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('passport.list')->with($notification);
    }

    /**
     * Passport Permanent Delete
     */
    public function passportPermanentDelete($id){

        EntryPassport::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Entry passport permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('passport.list')->with($notification);

    }
}
