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
    /**
     * Get tree
     *
     * @return JsonResponse
     */
    public function get()
    {
        return new JsonResponse('Welcome to the tree');
    }
}
