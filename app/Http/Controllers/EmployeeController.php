<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Employee;
use App\Http\Model\VEmployee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends CommonController
{
    public function listcard() {
        $loginPromission = session('employee')[0]['permission'];
        $employees = VEmployee::where('permission', '<=', $loginPromission)->get();

        // $employees = DB::table('employee')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();


        return view('pages.employeelistcard', ['employees' => $employees]);
    }

    public function listpage() {
        return view('pages.employeelist');
    }
    
    public function listdata() {
        $loginPromission = session('employee')[0]['permission'];
        $employees = VEmployee::where('permission', '<=', $loginPromission)->get();

        // $employees = DB::table('employee')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        return response()->json($employees);
    }
    
    public function add() {
        return view('pages.employeelist');
    }
    
    public function delete() {
        return view('pages.employeelist');
    }
    
    public function update() {
        return view('pages.employeelist');
    }
}
