<?php

namespace Modules\Employee\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class EMUserPositionGroupBasicSearch extends EMUserPositionGroup
{
  use Searchable;

  
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
    'columns' => [],
    'joins' => [],
  ];
}
