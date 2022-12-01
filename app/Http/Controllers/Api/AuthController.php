<?php

namespace App\Http\Controllers\Api;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AccountRepository;
use App\Http\Controllers\Controller;
use App\Jobs\SendMailResetPasswordJob;
use App\Http\Requests\AuthRequest;
use App\Repositories\SendReponseRepository;
use App\Repositories\BaseRepository;

class AuthController extends Controller
{

    public function __construct(Account $account)
    {
        // $this->middleware('auth:api', ['except' => ['login', 'resetpassword', 'changepassword']]);
        $this->model = new BaseRepository($account);
        $this->accountRepository = new AccountRepository();
    }

    public function login(AuthRequest $request)
    {
        try {
            $loginData = $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            if (!Auth::attempt($loginData)) {
                return $this->sendError('Unauthorized');
            }

            $accessToken = \auth()->user()->createToken('authToken')->plainTextToken;

            return $this->sendResponse([
                'user' => \auth()->user(),
                'access_token' => $accessToken,
                'token_type' => 'Bearer'
            ]);
        }
        catch (\Exception $exception) {
            return $this->sendError($exception->getMessage());
        }

    }

    public function logout()
    {
        Auth::logout();
        return $this->model->sendResponse("Logout");
    }

    public function resetpassword(Request $request)
    {
        $user = Account::select(['id', 'full_name', 'email'])->where(['email' => $request->email])->first();
        if (!empty($user)) {
            $code = rand(100000, 999999);
            $mail = new SendMailResetPasswordJob($user->email, $user->full_name, $code);
            dispatch($mail);
            return $this->model->sendResponse($code);
        } else {
            return $this->model->sendError();
        }
    }
    public function changepassword(AuthRequest $request)
    {
        $update = Account::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        if ($update) {
            return $this->model->sendResponse("Password is changed");
        } else {
            return $this->model->sendError();
        }
    }
}
