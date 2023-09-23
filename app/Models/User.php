<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'full_name'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'user_type' => UserTypeEnum::class,
    ];


    /**
     * Check For User Password against a given password
     */
    public function checkPassword(string $coming): bool
    {
        return Hash::check($coming, $this->getPassword());
    }

    public function getPassword(): string
    {
        return $this->password;
    }


    // relationships

    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
