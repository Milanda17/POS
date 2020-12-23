<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function test1(){
        $Data= Issue::all();
        return $Data;
    }

    public function addIssue(Request $request){

        $issue = new Issue();

        $issue->user_type=$request->input('user_type');
        $issue->user_id=$request->input('user_id');
        $issue->book_id=$request->input('book_id');
        $issue->book_name=$request->input('book_name');
        $issue->issue_day=$request->input('issue_day');
        $issue->how_many_days=$request->input('how_many_days');
        $issue->return_day=$request->input('return_day');
        $issue->return=false;

        $data = $issue -> save();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');


    }
    public function updateIssue(Request $request){


        $issue = Issue::find($request->input('id'));

        $issue->user_type=$request->input('user_type');
        $issue->user_id=$request->input('user_id');
        $issue->book_id=$request->input('book_id');
        $issue->book_name=$request->input('book_name');
        $issue->issue_day=$request->input('issue_day');
        $issue->how_many_days=$request->input('how_many_days');
        $issue->return_day=$request->input('return_day');

        $data = $issue -> save();
        return response(['data' => $data, 'status' => 200, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');


    }
    public function getIssue(){
        $data = Issue::all();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }
    public function deleteIssue($id){
//        dd($id);
        $data = Issue::find($id)->delete();
        return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }

    public function returnBook($id){
      $data = Issue::find($id);
      $data->return = true;
      $data->save();
      return response(['data' => $data, 'status' => 201, 'msg' => 'data loaded successfully'])->header('Content-Type', 'application/json');
    }
}
