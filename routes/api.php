<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', 'StudentController@test');


Route::post('/addStudent', 'StudentController@addStudent');
Route::post('/updateStudent', 'StudentController@updateStudent');
Route::get('/getStudent', 'StudentController@getStudent');
Route::get('/deleteStudent/{id}', 'StudentController@deleteStudent');

Route::post('/addStaff', 'StaffController@addStaff');
Route::post('/updateStaff', 'StaffController@updateStaff');
Route::get('/getStaff', 'StaffController@getStaff');
Route::get('/deleteStaff/{id}', 'StaffController@deleteStaff');


Route::post('/addBook', 'BookController@addBook');
Route::get('/getBook','BookController@getBook');
Route::post('/updateBook', 'BookController@updateBook');
Route::get('/deleteBook/{id}', 'BookController@deleteBook');


Route::post('/addIssue', 'IssueController@addIssue');
Route::get('/getIssue', 'IssueController@getIssue');
Route::post('/updateIssue', 'IssueController@updateIssue');
Route::get('/deleteIssue/{id}', 'IssueController@deleteIssue');


Route::get('/returnBook/{id}', 'IssueController@returnBook');

Route::get('/test1', 'IssueController@test1');


