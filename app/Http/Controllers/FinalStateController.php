<?php

namespace App\Http\Controllers;

use App\Models\EntryPassport;
use Illuminate\Http\Request;

class FinalStateController extends Controller
{
    /**
     * Final State List
     */
    public function finalStateList(){
        $all_data = EntryPassport::with(['test_medicals', 'final_medicals', 'police_clearances', 'mofas', 'visas', 'tran_certis', 'man_powers', 'flights'])->latest()->get();
        // dd($all_data);
        return view('final.final_state', compact('all_data'));
    }

    /**
     * Delete Final State
     */
    public function deleteFinalState($id){
        EntryPassport::findOrFail($id)->delete();

        $notification = [
            'message' => 'Entry passport trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('final.state.list')->with($notification);
    }
}
