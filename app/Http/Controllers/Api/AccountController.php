<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Repositories\SendReponseRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;


class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(Account $account)
    {
        $this->middleware('auth:api');
        $this->model = new BaseRepository($account);
        $this->accountRepository = new AccountRepository();
    }
    public function profile(){
        $id = auth()->user()->id;
        $data = $this->accountRepository->getData($id);
        return $this->model->sendResponse($data);
    }
    public function list(){
        $data = $this->accountRepository->getAllUser();
        return $this->model->sendResponse($data);
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $data = $this->accountRepository->search($search);
        return $this->model->sendResponse($data);
    }
    public function store(Request $request)
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
        $data = Account::find($request->id);
        return $this->model->sendResponse($data);
    }
    public function update(Request $request)
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
            $this->accountRepository->destroy($id);
            DB::commit();
            return $this->model->sendResponse("Detroy complete");
        } catch (Exception $e) {
            DB::rollback();
            return $this->model->sendError();
        }
    }
}
