<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        // Create Super Admin User
        $admin = User::factory()->state([
            'email' => 'super_admin@orderking.com',
            'full_name' => 'Super Admin',
            'user_id' => null,
            'user_type' => UserTypeEnum::SUPER_ADMIN,
        ])->create();
        $admin->assignRole(UserTypeEnum::SUPER_ADMIN->value);



        // Create 30 Merchants with 100 users each

        foreach (range( 1, 30) as $num) {

            // merchant
            $merchant = User::factory()->state([
                'email' => 'merchant_' . $num . '@orderking.com',
                'full_name' => 'Merchant_' . $num,
                'user_id' => null,
                'user_type' => UserTypeEnum::MERCHANT,
            ])->create();
            $merchant->assignRole(UserTypeEnum::MERCHANT->value);

            // 100 customers for each merchant
            foreach (range( 1, 100) as $num) {
                $user = User::factory()->state([
                    'email' => 'customer_' . $merchant->id .'_'. $num . '@orderking.com',
                    'full_name' => 'customer_' . $merchant->id .'_'. $num,
                    'user_id' => $merchant->id,
                    'user_type' => UserTypeEnum::CUSTOMER,
                ])->create();
                $user->assignRole(UserTypeEnum::CUSTOMER->value);
            }
        }
    }
}
