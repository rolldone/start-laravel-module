<?php

namespace Modules\GroupManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Entities\EMEmployee;

class GMPortal extends Model
{
  public $table = "gm_portals";

  protected $fillable = [];

  protected $casts = ['is_selected' => 'boolean'];

  public function group()
  {
    return $this->belongsTo(GMGroup::class, "gm_rel_id", "id")->where("gm_table_name", '=', GMGroup::$table);
  }

  public function division()
  {
    return $this->belongsTo(GMDivision::class, "gm_rel_id", "id")->where("gm_table_name", '=', GMDivision::$table);
  }

  public function position()
  {
    return $this->belongsTo(GMPosition::class, "gm_rel_id", "id")->where("gm_table_name", "=", GMPosition::$table);
  }

  public function employee()
  {
    return $this->belongsTo(EMEmployee::class, "gm_rel_id", "id")->where("gm_table_name", "=", EMEmployee::$table);
  }

  public function portals_groups()
  {
    return $this->hasMany(GMPortalGroup::class, "portal_id", "id");
  }
}
