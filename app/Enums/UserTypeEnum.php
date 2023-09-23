<?php

namespace App\Enums;

enum UserTypeEnum: string
{

    case SUPER_ADMIN = 'super_admin';
    case MERCHANT = 'merchant';

    case CUSTOMER = 'customer';

}
