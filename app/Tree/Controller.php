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

    /**
     * Constructor.
     *
     * @param Repository $repository Repository for persisting tree entities
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get tree
     *
     * @return JsonResponse
     */
    public function get()
    {
        $trees = $this->repository->getAll();

        return new JsonResponse($trees);
    }
}
