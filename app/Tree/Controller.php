<?php
declare(strict_types = 1);

namespace App\Tree;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Controller for interacting with the tree domain
 */
class Controller extends BaseController
{
    /** @var Repository Repository for persisting tree entities */
    private Repository $repository;

    /** @var TreeParser Responsible for building and parsing tree data structures */
    private TreeParser $treeParser;

    /**
     * Constructor.
     *
     * @param Repository $repository Repository for persisting tree entities
     * @param TreeParser $treeParser Responsible for building and parsing tree data structures
     */
    public function __construct(Repository $repository, TreeParser $treeParser)
    {
        $this->repository = $repository;
        $this->treeParser = $treeParser;
    }

    /**
     * Get tree
     *
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        $treeNodes = $this->repository->getAll();

        return new JsonResponse($this->treeParser->build($treeNodes));
    }
}
