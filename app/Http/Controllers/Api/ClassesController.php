<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassesRequest;
use App\Models\Classes;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Repositories\ClassesRepository;
use App\Repositories\SendReponseRepository;
use App\Repositories\BaseRepository;

class ClassesController extends Controller
{
    public function __construct(Classes $classes)
    {
        $this->middleware('auth:api');
        $this->model = new BaseRepository($classes);
        $this->classesRepository = new ClassesRepository();
    }
    public function list()
    {
        $data = $this->model->getAll();
        return $this->model->sendResponse($data);
    }
    public function listbyschool(Request $request)
    {
        $data = $this->classesRepository->listbyschool($request->id);
        return $this->model->sendResponse($data);
    }
    public function store(ClassesRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $this->model->create($data);
            DB::commit();
            return $this->model->sendResponse("Create complete");
        } catch (Exception $e) {
            DB::rollback();
            return $this->model->sendError();
        }
    }
    public function show(Request $request)
    {
        $data = Classes::find($request->id);
        return $this->model->sendResponse($data);
    }
    public function update(ClassesRequest $request)
    {
        $data = $request->except(['id']);
        $id = $request->id;
        try {
            DB::beginTransaction();
            $this->model->update($data,$id);
            DB::commit();
            return $this->model->sendResponse($data);
        } catch (Exception $e) {
            DB::rollback();
            return $this->model->sendError();
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        try {
            DB::beginTransaction();
            $this->model->destroy($id);
            DB::commit();
            return $this->classesRepository->sendResponse("Detroy complete");
        } catch (Exception $e) {
            DB::rollback();
            return $this->model->sendError();
        }
    }
}
