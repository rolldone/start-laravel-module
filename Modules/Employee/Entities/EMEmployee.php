<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EMEmployee extends Model
{
    use HasFactory;

    public $table = "em_employees";

    protected $fillable = [];

    protected static function newFactory()
    {
        // return \Modules\Employee\Database\factories\EMEmployeeFactory::new();
    }

    public function user_position_group()
    {
        return $this->hasOne(EMUserPositionGroup::class, "employee_id", "id");
    }
}
