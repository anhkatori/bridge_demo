<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

// class UserController extends BaseController
class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index() {
        return view('admin.users.index');
    }
}
