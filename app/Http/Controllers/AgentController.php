<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Agent list
     */
    public function agentsList(){
        $all_data = Agent::all();
        // dd($all_data);
        return view('agents.all_agents', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Agent Create Page
     */
    public function agentsCreate(){
        return view('agents.create_agents');
    }

    /**
     * Agent Store
     */
    public function agentsStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);


        Agent::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $notification = [
            'message' => 'Agent added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('agents.list')->with($notification);
    }

    /**
     * Edit Agent Page
     */
    public function agentsEdit($id){
        $data = Agent::findOrFail($id);
        return view('agents.edit_agents', [
            'data' => $data
        ]);
    }

    /**
     * Update Agent
     */
    public function agentsUpdate(Request $request, $id){

        $data = Agent::findOrFail($id);

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->update();

        $notification = [
            'message' => 'Agent updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('agents.list')->with($notification);

    }

    /**
     * Agent Delete
     */
    public function agentsDelete($id){
        Agent::findOrFail($id)->delete();

        $notification = [
            'message' => 'Agent trash successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('agents.list')->with($notification);
    }

    /**
     * Agent Trash list
     */
    public function agentsTrashList(){
        $all_data = Agent::onlyTrashed()->latest()->get();
        return view('agents.trash_agents', [
            'all_data' => $all_data
        ]);
    }

    /**
     * Agent Trash Recover
     */
    public function agentsRecover($id){
        Agent::withTrashed()->find($id)->restore();
        $notification = [
            'message' => 'Agent recover successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('agents.list')->with($notification);
    }

    /**
     * Agent Permanent Delete
     */
    public function agentsPermanentDelete($id){

        Agent::onlyTrashed()->find($id)->forceDelete();

        $notification = [
            'message' => 'Agent permanent deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('agents.list')->with($notification);

    }
}
