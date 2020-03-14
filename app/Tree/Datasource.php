<?php
declare(strict_types = 1);

namespace App\Tree;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Datasource for interacting with tree data
 */
class Datasource
{
    /** @var string Table to select data from */
    private $table = 'Tree';

    /**
     * Returns all trees
     */
    public function getAll(): Collection
    {
        return DB::table($this->table)->get(['id', 'name', 'parent_id']);
    }
}
