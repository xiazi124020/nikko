<?php
namespace App\http\Controllers;

class MyController extends Controller
{
 public function getAbout() {
     return 'about laravel';
 }

 public function home() {
    // return view('my_welcome')->with('name1', '吴三桂');
    $data = ['name' => '吴三桂','age' => 40];
    $test = "test test";
    return view('my_welcome', $data);
}


}
