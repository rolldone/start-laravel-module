<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Entities\dto\EmployeeDto;

class EMEmployee extends Model
{
    use HasFactory;

    public $table = "em_employees";

    protected $fillable = [];

    protected static function newFactory()
    {
        // return \Modules\Employee\Database\factories\EMEmployeeFactory::new();
    }
}
