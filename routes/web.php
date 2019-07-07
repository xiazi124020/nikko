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


// Route::get('test', function() {
//     return 'get request';
// });


// Route::post('test1', function() {

// });

// Route::any('test2', function() {
//     return 'any request';
// });

// Route::get('/about', 'MyController@getAbout');

// Route::resource('user', 'UserController');

// Route::get('/home', 'MyController@home');

// Route::get('/params', function() {
//     $people = [
//         // 'age' => 30,
//         // 'name' => null
//         '吴三桂',
//         '张三',
//         '李四',
//         '王五'
//     ];
//     return view('my_welcome', $people); 
    
// });

Route::any('login', 'LoginController@login');
Route::any('crypy', 'LoginController@crypt');
Route::any('index', 'IndexController@index');
