<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

   /* public function test(){
        $Data= Staff::all();
        return $Data;

    }*/

    public function addStaff (Request $request){

        $staff= new Staff();

        $staff->first_name = $request->input('first_name');
        $staff->last_name = $request->input('last_name');
        $staff->registration_id = $request->input('registration_id');
        $staff->email = $request->input('email');
        $staff->phone_number = $request->input('phone_number');
        $staff->address = $request->input('address');
        $staff->position = $request->input('position');


        $data = $staff -> save();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');

    }

    public function updateStaff (Request $request){

        $staff = Staff::find($request->input('id'));

        $staff->first_name = $request->input('first_name');
        $staff->last_name = $request->input('last_name');
        $staff->registration_id = $request->input('registration_id');
        $staff->email = $request->input('email');
        $staff->phone_number = $request->input('phone_number');
        $staff->address = $request->input('address');
        $staff->position = $request->input('position');


        $data = $staff -> save();
        return response(['data' => $data, 'status' => 200, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');

    }


    public function getStaff(){
        $data = Staff::all();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }
    public function deleteStaff($id){
//        dd($id);
        $data = Staff::find($id)->delete();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }

}
