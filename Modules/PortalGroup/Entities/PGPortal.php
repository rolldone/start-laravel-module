<?php

namespace Modules\PortalGroup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Entities\EMEmployee;
use Modules\GroupManagement\Entities\GMDivision;
use Modules\GroupManagement\Entities\GMGroup;
use Modules\GroupManagement\Entities\GMPosition;

class PGPortal extends Model
{
  public $table = "pg_portals";

  protected $fillable = [];

  protected $casts = ['is_selected' => 'boolean'];

  public function portals_groups()
  {
    return $this->hasMany(PGPortalGroup::class, "pg_portal_id", "id");
  }
}
