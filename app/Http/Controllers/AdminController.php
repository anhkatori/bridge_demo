<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        return view('admin.admin.index');
    }

    public function add() {
        return view('admin.admin.add');
    }
}
