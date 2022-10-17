<?php

namespace Modules\Employee\Entities;

use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EMEmployeeBasicSearch extends Model
{
    use HasFactory;
    use SearchableTrait;

    public $table = "em_employees";

    protected $fillable = [];

    protected static function newFactory()
    {
        // return \Modules\Employee\Database\factories\EMEmployeeFactory::new();
    }

    public function user_position_group()
    {
        return $this->hasOne(EMUserPositionGroupBasicSearch::class, "employee_id", "id");
    }

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
            'em_employees.first_name' => 10,
            'em_employees.last_name' => 10,
            'em_employees.email' => 10,
        ],
        'joins' => [
            'em_user_position_groups' => ['em_employees.id','em_user_position_groups.employee_id']
        ],
    ];
}
