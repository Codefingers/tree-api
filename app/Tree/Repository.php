<?php
declare(strict_types=1);

namespace App\Tree;

/**
 * Repository for persisting tree entities
 */
class Repository
{
    /** @var Datasource Datasource for interacting with tree data */
    private $datasource;

    /**
     * Constructor.
     *
     * @param Datasource $datasource Datasource for interacting with tree data
     */
    public function __construct(Datasource $datasource)
    {
        $this->datasource = $datasource;
    }

    /**
     * Returns tree nodes from the datasource
     *
     * @return TreeNode[]
     */
    public function getAll(): array
    {
        return array_map(function ($row) {
            return new TreeNode(
                $row->id,
                $row->name,
                $row->parent_id
            );
        }, $this->datasource->getAll()->all());

    }
}
