<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Questions;
use App\Repositories\SendReponseRepository;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;

class QuestionsController extends Controller
{
    public function __construct(Questions $question)
    {
        $this->middleware('auth:api');
        $this->model = new BaseRepository($question);
    }
    public function get_question(){
        $question = $this->model->getAll();
        return $this->model->sendResponse($question);
    }
}
