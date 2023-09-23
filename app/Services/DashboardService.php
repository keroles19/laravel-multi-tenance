<?php

namespace App\Services;


use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardService extends BaseService
{
    public function homeData(): array
    {
        return [
            'list' => checkType(UserTypeEnum::SUPER_ADMIN->value) ? $this->listMerchantsWithUsers() : $this->listUsers(),
        ];
    }


    /**
     * show merchant with users using id
     *
     * @param $id
     * @return array
     */
    public function ShowMerchant($id): array
    {
        $merchant = USer::where('id', $id)->first();
        if (!$merchant) {
            return $this->failed(404, 'Merchant Not Found', 404);
        }
        $users = User::where('user_id', $merchant->id)->paginate(10);

        return $this->success('200', ['merchant' => $merchant, 'users' => $users]);


    }


    /**
     * list all merchants with users
     *
     * @return mixed
     */
    protected function listMerchantsWithUsers(): mixed
    {
        return User::where('user_type', UserTypeEnum::MERCHANT->value)->withcount('users')->paginate(10);
    }


    /**
     * list all users for logged in merchant
     *
     * @return mixed
     */
    protected function listUsers(): mixed
    {
        return currentUser()->users()->paginate(10);
    }
}
