<?php

namespace Modules\UserAdmin\Entities;

use App\Models\User;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAdminBasicSearch extends User
{
    use SearchableTrait;
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

     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'users.name' => 10,
            'users.email' => 9,
        ],
        'joins' => [],
    ];
}
