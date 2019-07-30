<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Employee;
use App\Http\Model\Code;
use App\Http\Model\VEmployee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends CommonController
{
    public function listcard() {
        $loginPromission = session('employee')[0]['permission'];
        $employees = VEmployee::where('permission', '<=', $loginPromission)->get();

        return view('pages.employeelistcard', ['employees' => $employees]);
    }

    public function listpage() {
        return view('pages.employeelist');
    }
    
    public function listdata() {
        $loginPromission = session('employee')[0]['permission'];
        // $employees = VEmployee::where('permission', '<=', $loginPromission)->get();
        $employees = DB::table('employee')
            ->leftjoin('code AS a', function ($join) {
                $join->on('employee.title', '=', 'a.code_index')
                    ->where('a.code_id', '=', 2);
            })
            ->leftjoin('code AS b', function ($join) {
                $join->on('employee.sex', '=', 'b.code_index')
                    ->where('b.code_id', '=', 1);
            })->where('permission', '<=', $loginPromission)->get();

        $employees = (object)$employees;
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
