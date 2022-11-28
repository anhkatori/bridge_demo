<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Schools;
use App\Repositories\SchoolsRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SchoolRequest;
use App\Repositories\SendReponseRepository;
use App\Repositories\BaseRepository;

class SchoolsController extends Controller
{
    public function __construct(Schools $schools)
    {
        $this->middleware('auth:api');
        $this->model = new BaseRepository($schools);
        $this->schoolsRepository = new SchoolsRepository();
    }
    public function list()
    {
        $data = $this->model->getAll();
        return $this->model->sendResponse($data);
    }
    public function listbyschoolyear(Request $request)
    {
        $data = $this->schoolsRepository->listbyschoolyear($request->id);
        return $this->model->sendResponse($data);
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $data = $this->schoolsRepository->search($search);
        return $this->model->sendResponse($data);
    }
    public function store(SchoolRequest $request)
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
        $data = $this->model->find($request->id);
        return $this->model->sendResponse($data);
    }
    public function update(SchoolRequest $request)
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
            $this->schoolsRepository->destroy($id);
            DB::commit();
            return $this->model->sendResponse("Detroy complete");
        } catch (Exception $e) {
            DB::rollback();
            return $this->model->sendError();
        }
    }
}
