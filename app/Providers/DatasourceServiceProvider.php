<?php

namespace App\Providers;

use App\Tree\Datasource;
use Illuminate\Support\ServiceProvider;

class DatasourceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('TreeNode\Datasource', function ($app) {
            return new Datasource();
        });
    }
}
