<?php

namespace Modules\Privilege\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PVPrivilegeItem extends Model
{
  public $table = "pv_privileges_items";

  protected $fillable = [];

  protected $casts = [];

  public function privilege()
  {
    return $this->belongsTo(PVPrivilege::class, "pv_privilege_id", "id");
  }
}
