<?php

namespace Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
// use Modules\Auth\Database\Factories\TeacherFactory;

class Teacher extends Authenticatable
{
    use HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     */
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

    // protected static function newFactory(): TeacherFactory
    // {
    //     // return TeacherFactory::new();
    // }
}
