<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Repositories\BaseRepository;

class SubjectController extends Controller
{
    public function __construct(Subject $subject)
    {
        $this->middleware('auth:api');
        $this->model = new BaseRepository($subject);
    }
    public function list(){
        $data = $this->model->getAll();
        return $this->model->sendResponse($data);
    }
}
