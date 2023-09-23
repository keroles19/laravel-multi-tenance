<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Services\DashboardService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $homeService)
    {
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        if(checkType(UserTypeEnum::SUPER_ADMIN->value)){
            return view('dashboard.admin')->with($this->homeService->homeData());
        }
        return view('dashboard.merchant')->with($this->homeService->homeData());


    }


    /**
     * @return View|Factory|Application
     */
    public function welcome(): View|Factory|Application
    {
        return view('welcome')->with(['user' => currentUser()]);
    }


    /**
     * @param $id
     * @return Application|View|RedirectResponse
     */
    public function ShowMerchant($id): Application|View|RedirectResponse
    {
        $result = $this->homeService->ShowMerchant($id);
        if (!$result['success']) {
            return back()->withErrors($result['message']);
        }
        return view('merchant.index')->with($result['data']);
    }
}
