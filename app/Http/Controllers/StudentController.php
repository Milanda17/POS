<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function test(){
        $Data= Student::all();
        return $Data;

    }

    public function addStudent(Request $request){

        $student = new Student();

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->register_id = $request->input('register_id');
        $student->email = $request->input('email');
        $student->phone_number = $request->input('phone_number');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->age = $request->input('age');
        $student->grade = $request->input('grade');
        $student->school = $request->input('school');
        $student->acer_literacy = $request->input('acer_literacy');
        $student->acer_numeracy = $request->input('acer_numeracy');

        $data = $student -> save();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');

    }

    public function updateStudent(Request $request){

        $student = Student::find($request->input('id'));

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->register_id = $request->input('register_id');
        $student->email = $request->input('email');
        $student->phone_number = $request->input('phone_number');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->age = $request->input('age');
        $student->grade = $request->input('grade');
        $student->school = $request->input('school');
        $student->acer_literacy = $request->input('acer_literacy');
        $student->acer_numeracy = $request->input('acer_numeracy');


        $data = $student -> save();
        return response(['data' => $data, 'status' => 200, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');

    }

    public function getStudent(){
        $data = Student::all();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }


    public function deleteStudent($id){
//        dd($id);
       $data = Student::find($id)->delete();
       return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }

}
