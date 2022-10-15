<?php

namespace Modules\PortalGroup\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Entities\User;

class PGPortalSelected extends Model
{
  public $table = "pg_portals_selected";

  protected $fillable = [];

  protected $casts = ['data' => 'json'];

  public function user()
  {
    return $this->belongsTo(PGUser::class, "user_id", "id");
  }

  public function portal()
  {
    return $this->belongsTo(PGPortal::class, "pg_portal_id", "id");
  }

  public function portal_group()
  {
    return $this->belongsTo(PGPortalGroup::class, "pg_portal_group_id", "id");
  }
}
