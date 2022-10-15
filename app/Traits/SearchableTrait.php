<?php 
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Nicolaslopezj\Searchable\SearchableTrait as ParentSearchableTraits;

/**
 * Trait SearchableTrait
 * @package Nicolaslopezj\Searchable
 * @property array $searchable
 * @property string $table
 * @property string $primaryKey
 * @method string getTable()
 */
trait SearchableTrait
{
    use ParentSearchableTraits;
    /**
     * Makes the query not repeat the results.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     */
    protected function makeGroupBy(Builder $query)
    {
        if ($groupBy = $this->getGroupBy()) {
            $query->groupBy($groupBy);
        } else {
            $driver = $this->getDatabaseDriver();

            if ($driver == 'sqlsrv') {
                $columns = $this->getTableColumns();
            } else {
                $columns = $this->getTable() . '.' .$this->primaryKey;
            }

            $query->groupBy($columns);

            $joins = array_keys(($this->getJoins()));

            foreach ($this->getColumns() as $column => $relevance) {
                array_map(function ($join) use ($column, $query) {
                    if (Str::contains($column, $join)) {
                        $whatIWant = '';
                        if (($pos = strpos($column, ".")) !== FALSE) { 
                            $whatIWant = substr($column, $pos+1); 
                        }
                        $query->groupBy($join.'.'.$whatIWant);
                    }
                }, $joins);
            }
        }
    }
}