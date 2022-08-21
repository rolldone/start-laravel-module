<?php

namespace Modules\GroupManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GMPosition extends Model
{
    use HasFactory;

    public $table = "gm_positions";

    protected $fillable = [];

    protected $casts = ['is_enable' => 'boolean'];

    protected static function newFactory()
    {
        // return \Modules\GroupManagement\Database\factories\GMPositionFactory::new();
    }
}
