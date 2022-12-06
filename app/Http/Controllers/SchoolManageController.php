<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolManageController extends Controller
{
    //
    public function index(){
        return view('admin.school.index');
    }

    public function add() {
        return view('admin.school.add');
    }
}
