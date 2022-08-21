<?php

namespace Modules\GroupManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GMGroup extends Model
{
    use HasFactory;

    public $table = "gm_groups";

    protected $fillable = [];
    
    protected $casts = ['is_enable' => 'boolean'];

    protected static function newFactory()
    {
        // return \Modules\GroupManagement\Database\factories\GMGroupFactory::new();
    }
}
