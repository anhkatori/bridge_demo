<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolYearRequest;
use App\Models\SchoolYear;
use App\Repositories\SchoolYearRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class SchoolYearController extends Controller
{
    public function __construct(SchoolYear $schoolYear)
    {
        $this->middleware('auth:api');
        $this->model = new BaseRepository($schoolYear);
        $this->schoolYearRepository = new SchoolYearRepository();
    }
    public function list()
    {
        $data = $this->model->getAll();
        return $this->model->sendResponse($data);
    }
    public function store(SchoolYearRequest $request)
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
    public function update(SchoolYearRequest $request)
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
            return $this->model->sendResponse("Detroy complete");
        } catch (Exception $e) {
            DB::rollback();
            return $this->model->sendError();
        }
    }
}
