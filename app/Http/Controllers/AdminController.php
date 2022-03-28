<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Admin Logout
     */
    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }

    ///////////////// Users Methods //////////////////

    /**
     * User list
     */
    public function usersList(){
        $all_data = User::all();
        return view('users.all_users', [
            'all_data' => $all_data
        ]);
    }

    /**
     * User Create Page
     */
    public function usersCreate(){
        return view('users.create_users');
    }

    /**
     * User Store
     */
    public function usersStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'type' => 2,
            'users' => $request->users,
            'entery_passport' => $request->entery_passport,
            'test_medical' => $request->test_medical,
            'final_medical' => $request->final_medical,
            'police_clearance' => $request->police_clearance,
            'mofa' => $request->mofa,
            'visa' => $request->visa,
            'traning_certificate' => $request->traning_certificate,
            'man_power' => $request->man_power,
            'flight' => $request->flight,
            'accounts' => $request->accounts,
            'agent' => $request->agent,
        ]);

        $notification = [
            'message' => 'User added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('users.list')->with($notification);
    }

    /**
     * Edit User Page
     */
    public function usersEdit($id){
        $data = User::findOrFail($id);
        return view('users.edit_users', [
            'data' => $data
        ]);
    }

    /**
     * Update User
     */
    public function usersUpdate(Request $request, $id){

        $data = User::findOrFail($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->type = 2;
        $data->users = $request->users;
        $data->entery_passport = $request->entery_passport;
        $data->test_medical = $request->test_medical;
        $data->final_medical = $request->final_medical;
        $data->police_clearance = $request->police_clearance;
        $data->mofa = $request->mofa;
        $data->visa = $request->visa;
        $data->traning_certificate = $request->traning_certificate;
        $data->man_power = $request->man_power;
        $data->flight = $request->flight;
        $data->accounts = $request->accounts;
        $data->agent = $request->agent;
        $data->update();

        $notification = [
            'message' => 'User updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('users.list')->with($notification);

    }

    /**
     * User Delete
     */
    public function usersDelete($id){
        User::findOrFail($id)->delete();

        $notification = [
            'message' => 'User trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('users.list')->with($notification);
    }

    /**
     * User Trash list
     */
    public function usersTrashList(){
        $all_data = User::onlyTrashed()->latest()->get();
        return view('users.trash_users', [
            'all_data' => $all_data
        ]);
    }

    /**
     * User Trash Recover
     */
    public function usersRecover($id){
        User::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'User recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('users.list')->with($notification);
    }

    /**
     * User Permanent Delete
     */
    public function usersPermanentDelete($id){

        User::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'User permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('users.list')->with($notification);

    }



    /////////////////// User Profile ///////////////////

    /**
     * User Profile Page
     */
    public function userProfile(){
        $data = User::findOrFail(Auth::user()->id);
        return view('users.profile.profile', [
            'data' => $data
        ]);
    }

    /**
     * User Profile Edit
     */
    public function userProfileEdit($id){
        $data = User::findOrFail($id);
        return view('users.profile.profile_edit', [
            'data' => $data
        ]);
    }

    /**
     * User Update Profile
     */
    public function usersUpdateProfile(Request $request, $id){
        $data = User::findOrFail($id);

        $user_image = [];
        if($request->hasFile('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            $unique_image = md5(time().rand()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('media/users/'), $unique_image);

            $user_image = 'media/users/'.$unique_image;

            if (file_exists('media/users/' . $data->profile_photo_path) && !empty($data->profile_photo_path)) {
                unlink('media/users/' . $users);
            }

        }else {
            $user_image = $data->profile_photo_path;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->profile_photo_path = $user_image;
        $data->update();

        $notification = [
            'message' => 'User profile updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('user.profile')->with($notification);

    }

    /**
     * Change Password
     */
    public function changePassword(){
        return view('users.password.change_password');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request, $id){
        // find user has or not
        $data = User::where('id', $id)->first();

        // user data successfully get or not
        if($data != null){
            // check password match or not
            if (Auth::attempt(['email' => $request->email, 'password' => $request->old_password])) {

                $data->password = password_hash($request->new_password, PASSWORD_DEFAULT);
                $data->update();

                $notification = [
                    'message' => 'Password updated successfully',
                    'alert-type' => 'success',
                ];

                return redirect()->route('user.profile')->with($notification);

            } else {


                $notification = [
                    'message' => 'Sorry! your password and email do not match our record.',
                    'alert-type' => 'success',
                ];

                return redirect()->back()->with($notification);

            }
        }else {

            $notification = [
                'message' => 'Something is wrong! plase try again!',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

        }
    }

}
