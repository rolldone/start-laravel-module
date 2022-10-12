<?php

namespace Modules\GroupManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Entities\User;

class GMPortalSelected extends Model
{
  public $table = "gm_portals_selected";

  protected $fillable = [];

  protected $casts = ['data' => 'json'];

  public function user()
  {
    return $this->belongsTo(User::class, "user_id", "id");
  }

  public function portal()
  {
    return $this->belongsTo(GMPortal::class, "portal_id", "id");
  }
}
