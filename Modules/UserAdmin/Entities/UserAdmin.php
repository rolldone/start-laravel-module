<?php

namespace Modules\UserAdmin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAdmin extends User
{
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\UserAdmin\Database\factories\UserAdminFactory::new();
    // }
}
