<?php

namespace App\Repositories\Backend;

use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\UserController;
use App\Repositories\Backend\Section\SectionRepository;
use App\Repositories\Backend\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app
            ->when(SectionController::class)
            ->needs(CrudRepositoryInterface::class)
            ->give(SectionRepository::class);

        $this->app
            ->when(UserController::class)
            ->needs(CrudRepositoryInterface::class)
            ->give(UserRepository::class);
    }
}
