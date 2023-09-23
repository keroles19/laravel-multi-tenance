<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    /**
     * @param $loginData
     * @return int[]
     */
    public function login($loginData): array
    {

        $user = User::where('email', $loginData['email'])->first();

        if (!$user || !$user->checkPassword($loginData['password'])) {
            return $this->failed('400', ['error' => 'Invalid Data', 1060]);
        }

        Auth::login($user);

        return $this->success(200, ['message' => 'Welcome Back']);
    }

    public function logout(): array
    {
        Auth::logout();
        return $this->success(200, ['message' => 'successfully logout']);
    }

}
