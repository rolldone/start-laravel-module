<?php

namespace Modules\GroupManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class GMPortalGroup extends Model
{
  public $table = "gm_portals_groups";

  protected $fillable = [];

  protected $casts = [];

  public function group()
  {
    return $this->belongsTo(GMGroup::class, "gm_group_id", "id");
  }

  public function portal()
  {
    return $this->belongsTo(GMPortal::class, "gm_portal_id", "id");
  }
}
