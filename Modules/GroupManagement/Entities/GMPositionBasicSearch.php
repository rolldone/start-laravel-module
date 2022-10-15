<?php

namespace Modules\GroupManagement\Entities;

use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GMPositionBasicSearch extends Model
{
    use HasFactory;
    use SearchableTrait;

    public $table = "gm_positions";

    protected $fillable = [];

    protected $casts = ['is_enable' => 'boolean'];

    protected static function newFactory()
    {
        // return \Modules\GroupManagement\Database\factories\GMPositionFactory::new();
    }

    public function division()
    {
        return $this->belongsTo(GMDivision::class, "division_id", "id");
    }

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'gm_positions.name' => 10,
        ],
        'joins' => [],
    ];
}
