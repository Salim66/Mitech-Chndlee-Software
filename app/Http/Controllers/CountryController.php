<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Country list
     */
    public function countriesList(){
        $all_data = Country::all();
        // dd($all_data);
        return view('countries.all_countries', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Country Create Page
     */
    public function countriesCreate(){
        return view('countries.create_countries');
    }

    /**
     * Country Store
     */
    public function countriesStore(Request $request){
        $this->validate($request, [
            'country_name' => 'required|unique:countries,country_name'
        ]);


        Country::create([
            'country_name' => $request->country_name
        ]);

        $notification = [
            'message' => 'Country added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('countries.list')->with($notification);
    }

    /**
     * Edit Country Page
     */
    public function countriesEdit($id){
        $data = Country::findOrFail($id);
        return view('countries.edit_countries', [
            'data' => $data
        ]);
    }

    /**
     * Update Country
     */
    public function countriesUpdate(Request $request, $id){

        $data = Country::findOrFail($id);

        $data->country_name = $request->country_name;
        $data->update();

        $notification = [
            'message' => 'Country updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('countries.list')->with($notification);

    }

    /**
     * Country Delete
     */
    public function countriesDelete($id){
        Country::findOrFail($id)->delete();

        $notification = [
            'message' => 'Country trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('countries.list')->with($notification);
    }

    /**
     * Country Trash list
     */
    public function countriesTrashList(){
        $all_data = Country::onlyTrashed()->latest()->get();
        return view('countries.trash_countries', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Country Trash Recover
     */
    public function countriesRecover($id){
        Country::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Country recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('countries.list')->with($notification);
    }

    /**
     * Country Permanent Delete
     */
    public function countriesPermanentDelete($id){

        Country::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Country permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('countries.list')->with($notification);

    }
}
