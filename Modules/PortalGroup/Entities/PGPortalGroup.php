<?php

namespace Modules\PortalGroup\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\GroupManagement\Entities\GMGroup;

class PGPortalGroup extends Model
{
  public $table = "pg_portals_groups";

  protected $fillable = [];

  protected $casts = [];

  public function group()
  {
    return $this->belongsTo(GMGroup::class, "gm_group_id", "id");
  }

  public function portal()
  {
    return $this->belongsTo(PGPortal::class, "pg_portal_id", "id");
  }

  public function selected()
  {
    return $this->hasOne(PGPortalSelected::class, "pg_portal_group_id", "id");
  }
}
