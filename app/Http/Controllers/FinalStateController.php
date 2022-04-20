<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntryPassport;
use Illuminate\Support\Facades\Auth;

class FinalStateController extends Controller
{
    /**
     * Final State List
     */
    public function finalStateList(){

        $all_data = [];
        if(Auth::user()->type == 1){
            $all_data = EntryPassport::with(['test_medicals', 'final_medicals', 'police_clearances', 'mofas', 'visas', 'tran_certis', 'man_powers', 'flights'])->latest()->get();
        }

        if(Auth::user()->type == 2){
            $all_data = EntryPassport::with(['test_medicals', 'final_medicals', 'police_clearances', 'mofas', 'visas', 'tran_certis', 'man_powers', 'flights'])->where('agent_id', Auth::user()->agent_id)->latest()->get();
        }



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
