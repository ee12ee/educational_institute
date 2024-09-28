<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
// use Modules\Auth\Database\Factories\AdminFactory;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     */
    protected $guard_name = ['admin'];
    protected $fillable = ['first_name',
                           'last_name',
                           'username',
                           'phone',
                           'email',
                           'password'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // protected static function newFactory(): AdminFactory
    // {
    //     // return AdminFactory::new();
    // }
}
