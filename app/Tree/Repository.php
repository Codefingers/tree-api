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

    /** @var TreeParser Responsible for building trees */
    private $treeBuilder;

    /**
     * Constructor.
     *
     * @param Datasource  $datasource  Datasource for interacting with tree data
     * @param TreeParser $treeBuilder Responsible for building trees
     */
    public function __construct(Datasource $datasource, TreeParser $treeBuilder)
    {
        $this->datasource = $datasource;
        $this->treeBuilder = $treeBuilder;
    }

    /**
     * Returns all trees
     */
    public function getAll()
    {
        $treeData = array_map(function ($row) {
            return new TreeNode(
                $row->id,
                $row->name,
                $row->parent_id
            );
        }, $this->datasource->getAll()->all());

        return $this->treeBuilder->build($treeData);
    }
}
