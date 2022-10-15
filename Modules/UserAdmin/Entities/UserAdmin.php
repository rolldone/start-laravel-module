<?php

namespace Modules\UserAdmin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class UserAdmin extends User
{
    use Searchable;
    public $table = "users";
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

    public function toSearchableArray()
    {
        return [
            "email" => $this->email,
            "name" => $this->name
        ];
    }
}
