<?php

namespace Modules\GroupManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GMDivision extends Model
{
    use HasFactory;

    public $table = "gm_divisions";

    protected $fillable = [];

    protected $casts = ['is_enable' => 'boolean'];

    protected static function newFactory()
    {
        // return \Modules\GroupManagement\Database\factories\GMDivisionFactory::new();
    }

    public function parent_division()
    {
        return $this->belongsTo(GMDivision::class, "parent_id");
    }
}
