<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
    }

    public function showLogin(): View|Application
    {
        return view('auth.login');
    }

    public function login(LoginFormRequest $request): RedirectResponse
    {
        $result = $this->authService->login($request->validated());
        if ($result['success']) {

            if (checkType(UserTypeEnum::CUSTOMER->value)) {
                return redirect()->intended(route('dashboard.welcome'));
            }
            return redirect()->intended(route('dashboard.home'));
        }

        return back()->withErrors('Invalid Data');
    }


    public function logout(): RedirectResponse
    {
        $result = $this->authService->logout();
        return redirect('/login')->with('success', $result['data']['message']);
    }

}
