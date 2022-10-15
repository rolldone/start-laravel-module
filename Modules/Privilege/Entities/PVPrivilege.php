<?php

namespace Modules\Privilege\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PVPrivilege extends Model
{
  public $table = "pv_privileges";

  protected $fillable = [];

  protected $casts = ['is_selected' => 'boolean'];


}
