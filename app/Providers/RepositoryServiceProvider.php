<?php

namespace App\Providers;

use App\Tree\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TreeNode\Repository', function (Application $app) {
            return new Repository($app->get('TreeNode\DataSource'));
        });
    }
}
