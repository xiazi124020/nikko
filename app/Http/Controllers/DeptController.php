<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Dept;

class DeptController extends CommonController
{
    public function list() {
        
        $dept = Dept::all();
        $dept = Dept::where('id', '=', 1)->get();
        $dept = Dept::where('name', '=', '第一開発部')->get();
        return $dept;
    }
}
