<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\Employee;
use Illuminate\Support\Facades\DB;

class LoginController extends CommonController
{
    public function login() {
        if($input = Input::all()) {
            $employee = Employee::where('email', $input['email'])->where('password', $input['password'])->get();
            // dd($employee);
            if($employee->isEmpty()) {
                session(['employee'=>null]);
                return back()->with('msg', 'メールアドレスまたはパスワード不正！');
            }

            session(['employee'=>$employee]);

            return view('pages.home');
        } else {
            // print(session('employee'));
            if(session('employee') != null) {
                return view('pages.home');
            }
            return view('login');
        }

    }
    public function crypt() {
        $str = '123456';
        echo Crypt::encrypt($str);
        echo "<br/>";
        echo Crypt::decrypt("eyJpdiI6Ill4TmJRc2YxQXhTeXpZUlE3MEhlXC93PT0iLCJ2YWx1ZSI6Ik5HbVFiMklCblRcL0dYdlloYW1hbkhRPT0iLCJtYWMiOiIyNDcyODY2OGZlYzI5ZWRmNWJlNjk2ZDk0OGM0NmRiY2Q4YzFiNjViYjIxYjZjNDQzMTZmYjNlZTI5MDViODZiIn0");
        
    }
}
