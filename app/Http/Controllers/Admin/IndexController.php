<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
    public function index() {
        
        return view('pages.home');
    }
}
