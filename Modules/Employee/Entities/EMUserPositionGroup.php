<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Entities\dto\EmployeeDto;

class EMUserPositionGroup extends Model
{
  use HasFactory;

  public $table = "em_user_position_groups";

  protected $fillable = [];

  protected static function newFactory()
  {
    // return \Modules\Employee\Database\factories\EMEmployeeFactory::new();
  }
}
