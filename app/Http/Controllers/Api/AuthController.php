<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Mail\ForgotPasswordMail;
use App\Mail\MailCode;
use App\Repositories\AccountRepository;
use App\Repositories\PasswordResetRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends BaseController
{
    protected $accountRepository;
    protected $passwordResetRepository;

    public function __construct()
    {
        $this->accountRepository = new AccountRepository();
        // $this->passwordResetRepository = new PasswordResetRepository();
    }

    public function register(Request $request): JsonResponse
    {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = $this->accountRepository->create($data);
        return $this->sendResponse([
            'user' => $user,
        ]);
    }

    public function login(Request $request): JsonResponse
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
                'token_type' => 'Bearer',
                'url' => url('/users')
            ]);
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage());
        }
    }

    public function me(): JsonResponse
    {
        return $this->sendResponse([
            'user' => Auth::user()
        ]);
    }

    public function refresh(Request $request): JsonResponse
    {
        try {
            $user = $request->user();
            $user->tokens()->delete();
            $accessToken = $user->createToken($user->name)->plainTextToken;
            return $this->sendResponse([
                'access_token' => $accessToken,
                'token_type' => 'Bearer'
            ]);
        } catch (\Exception $exception) {
            return $this->sendError($exception->getMessage());
        }
    }

    public function logout(): JsonResponse
    {
        if (Auth::check()) {
            $user = Auth::user()->tokens();
            return $this->sendResponse($user->delete(), 'Success logout');
        }
        return $this->sendError('Error');
    }

    // public function forgotPassword(Request $request): JsonResponse
    // {
    //     try {
    //         $request->validate([
    //             'email' => 'required|email'
    //         ]);
    //         $email = $request['email'];
    //         if ($this->accountRepository->getMail($email) == null) {
    //             return $this->sendError('Email not exist!');
    //         }
    //         $passwordReset = $this->passwordResetRepository->updateOrCreate([
    //             'email' => $email,
    //             'token' => Str::random(60)
    //         ]);
    //         $mailData = [
    //             'mail' => $email,
    //             'token' => $passwordReset->token
    //         ];
    //         Mail::to($email)->send(new ForgotPasswordMail($mailData));
    //         return $this->sendResponse('Success');
    //     }
    //     catch (\Exception $exception){
    //         return $this->sendError($exception->getMessage());
    //     }
    // }

    // public function sendMailCode(Request $request): JsonResponse
    // {
    //     try {
    //         $mail = $request['mail'];
    //         $code = rand(100000,999999);
    //         Mail::to($mail)->send(new MailCode($code));
    //         return $this->sendResponse('Success');
    //     }
    //     catch (\Exception $exception) {
    //         return $this->sendError($exception->getMessage());
    //     }
    // }

    // public function resetPassword(Request $request, $token): JsonResponse
    // {
    //     try {
    //         $password = $request->password;
    //         $passwordReset = $this->passwordResetRepository->findByCond([
    //             'token' => $token
    //         ]);
    //         if (!$passwordReset) {
    //             return $this->sendError('Token is invalid');
    //         }
    //         $checkTimeToken = $this->passwordResetRepository->checkTimeToken($passwordReset->updated_at);
    //         if ($checkTimeToken == false) {
    //             $passwordReset->delete();
    //             return $this->sendError('The verification link has expired');
    //         }
    //         $account = $this->accountRepository->findByCond(['email', $passwordReset->email]);
    //         $this->accountRepository->update([
    //             'password' => Hash::make($password)
    //         ], $account->id);
    //         $passwordReset->delete();
    //         return $this->sendResponse('Success');
    //     }
    //     catch (\Exception $exception) {
    //         return $this->sendError($exception->getMessage());
    //     }
    // }
}
