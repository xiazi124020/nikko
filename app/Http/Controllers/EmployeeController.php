<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends CommonController
{
    public function list() {
        $loginPromission = session('employee')[0]['permission'];
        $employees = Employee::where('permission', '<=', $loginPromission)->get();

        // $employees = DB::table('employee')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();


        return view('pages.employeelist', ['employees' => $employees]);
    }
}
