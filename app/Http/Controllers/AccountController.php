<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Agent;
use App\Models\EntryPassport;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Account list
     */
    public function accountsList( Request $request ){

        if( request() -> ajax() ){

           // when two date is empty and  business id has this purson is run
           if( !empty( $request->passenger_id ) && $request->from_date == "Invalid date" ){

               return datatables()->of( Account::with( 'entry' )->where('passenger_id', $request->passenger_id)->latest()->get() )->addColumn( 'action', function ( $data ) {
                   $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_account_data" style="margin-right: 10px;"><i class="fa fa-edit"></i></a>';

                   $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="account_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                   $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                   return $output;
               } )->rawColumns( ['action'] )->make( true );

           }

           // when two date has and  business id is empty agent id
            if ( !empty( $request->from_date ) && !empty( $request->to_date && empty( $request->passenger_id ) ) ) {

               return datatables()->of( Account::with( 'entry' )->whereBetween('created_at', [$request->from_date, $request->to_date])->latest()->get() )->addColumn( 'action', function ( $data ) {
                   $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_account_data" style="margin-right: 10px;"><i class="fa fa-edit"></i></a>';

                   $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="account_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                   $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                   return $output;
               } )->rawColumns( ['action'] )->make( true );

           }

           // when all data has
           if( !empty( $request->from_date ) && !empty( $request->to_date ) && !empty( $request->passenger_id ) ){

               return datatables()->of( Account::with( 'entry' )->whereBetween('created_at', [$request->from_date, $request->to_date])->where('passenger_id', $request->passenger_id)->latest()->get() )->addColumn( 'action', function ( $data ) {
                       $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_account_data" style="margin-right: 10px;"><i class="fa fa-edit"></i></a>';

                       $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="account_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                       $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                       return $output;
               } )->rawColumns( ['action'] )->make( true );

           }

           // When all fields are empty this purson is run
           if( empty( $request->passenger_id ) && empty( $request->from_date ) && empty( $request->to_date )){

               return datatables()->of( Account::with( 'entry' )->latest()->get() )->addColumn( 'action', function ( $data ) {
                   $output = '<a title="Edit" edit_id="' . $data['id'] . '" href="#" class="btn btn-sm btn-outline-info edit_account_data" style="margin-right: 10px;"><i class="fa fa-edit"></i></a>';

                   $output .= '<form style="display: inline;" action="#" method="POST" delete_id = "'.$data['id'].'" class="account_delete_form"><input type="hidden" name="id" class="delete_in" value="' .
                   $data['id'] . '"><button type="submit" class="btn btn-sm ml-1 btn-outline-danger" ><i class="fa fa-trash"></i></button></form>';
                   return $output;
               } )->rawColumns( ['action'] )->make( true );

           }


       }


        $all_data = Account::with('entry')->latest()->get();
        // dd($all_data);
        return view('accounts.all_accounts');
    }

    /**
     * Account Create Page
     */
    public function accountsCreate(){
        return view('accounts.create_accounts');
    }

    /**
     * Account Store
     */
    public function accountsStore(Request $request){
        $this->validate($request, [
            'passenger_id' => 'required',
            'amount' => 'required',
            'purpose' => 'required',
            'payment_receive_status' => 'required',
        ]);


        Account::create([
            'passenger_id' => $request->passenger_id,
            'amount' => $request->amount,
            'purpose' => $request->purpose,
            'payment_receive_status' => $request->payment_receive_status,
        ]);

        $notification = [
            'message' => 'Account added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('accounts.list')->with($notification);
    }

    /**
     * Edit Account Page
     */
    public function accountsEdit($id){
        $data = Account::findOrFail($id);
        // return $data;
        // //All agent
        $entry = EntryPassport::latest()->get();
        // return $entry;
        //Selected agent id
        $selected_passenger_id = $data->entry->id;


        $passen_list = '';
        foreach ( $entry as $passen ) {
            if ( $passen->id === $selected_passenger_id ) {
                $selected = 'selected';
            } else {
                $selected = '';
            }

            $passen_list .= '<option value="' . $passen->id . '" ' . $selected . '>' . $passen->name . '</option>';

        }


        // return
        return [
            'id'     => $data->id,
            'passen'  => $passen_list,
            'amount' => $data->amount,
            'purpose' => $data->purpose,
            'payment_receive_status' => $data->payment_receive_status,
        ];

    }

    /**
     * Update Account
     */
    public function accountsUpdate(Request $request){

        $data = Account::findOrFail($request->id);
        // return $data;

        $data->passenger_id = $request->passenger_id;
        $data->amount = $request->amount;
        $data->purpose = $request->purpose;
        $data->payment_receive_status = $request->payment_receive_status;
        $data->update();

        $notification = [
            'message' => 'Account updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('accounts.list')->with($notification);

    }

    /**
     * Account Delete
     */
    public function accountsDelete(Request $request){
        Account::findOrFail($request->id)->delete();

        $notification = [
            'message' => 'Account trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('accounts.list')->with($notification);
    }

    /**
     * Account Trash list
     */
    public function accountsTrashList(){
        $all_data = Account::onlyTrashed()->latest()->get();
        return view('accounts.trash_accounts', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Account Trash Recover
     */
    public function accountsRecover($id){
        Account::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Account recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('accounts.list')->with($notification);
    }

    /**
     * Account Permanent Delete
     */
    public function accountsPermanentDelete($id){

        Account::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Account permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('accounts.list')->with($notification);

    }
}
