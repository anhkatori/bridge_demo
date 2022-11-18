<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolManageController extends Controller
{
    //
    public function index(){
        return view('admin.school.index');
    }
}
