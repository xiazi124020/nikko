<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::any('login', 'LoginController@login');
Route::any('crypy', 'LoginController@crypt');

Route::group(['middleware' => ['web', 'check.login']], function() {
    Route::any('index', 'IndexController@index');
    Route::any('/employee/listpage', 'EmployeeController@listpage');
    Route::any('/employee/listdata', 'EmployeeController@listdata');
    Route::any('/employee/add', 'EmployeeController@add');
    Route::any('/employee/update', 'EmployeeController@update');
    Route::any('/employee/delete', 'EmployeeController@delete');
    Route::any('/employee/listcard', 'EmployeeController@listcard');
    Route::any('/project/list', 'ProjectController@list');
    Route::any('/customer/list', 'CustomerController@list');
    Route::any('/process/list', 'ProcessController@list');
    Route::any('/dept/list', 'DeptController@list');
});