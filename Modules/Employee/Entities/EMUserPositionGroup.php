<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Modules\GroupManagement\Entities\GMDivision;
use Modules\GroupManagement\Entities\GMGroup;
use Modules\GroupManagement\Entities\GMPosition;
use phpDocumentor\Reflection\Types\Boolean;

class EMUserPositionGroup extends Model
{
  use HasFactory;
  use Searchable;

  public $table = "em_user_position_groups";

  protected $fillable = [];

  protected $casts = ['is_enabled' => 'boolean'];


  public function employee()
  {
    return $this->belongsTo(EMEmployee::class, "employee_id", "id");
  }

  public function division()
  {
    return $this->belongsTo(GMDivision::class, "division_id", "id");
  }

  public function position()
  {
    return $this->belongsTo(GMPosition::class, "position_id", "id");
  }

  public function group()
  {
    return $this->belongsTo(GMGroup::class, "group_id", "id");
  }

  protected static function newFactory()
  {
    // return \Modules\Employee\Database\factories\EMEmployeeFactory::new();
  }
}
