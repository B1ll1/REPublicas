<?php

namespace Republicas\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Republicas\Contracts\Repositories\RepublicRepository::class, \Republicas\Repositories\Eloquent\RepublicRepositoryEloquent::class);
        $this->app->bind(\Republicas\Contracts\Repositories\RoomRepository::class, \Republicas\Repositories\Eloquent\RoomRepositoryEloquent::class);
        $this->app->bind(\Republicas\Contracts\Repositories\UserRepository::class, \Republicas\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\Republicas\Contracts\Repositories\BillRepository::class, \Republicas\Repositories\Eloquent\BillRepositoryEloquent::class);
        $this->app->bind(\Republicas\Contracts\Repositories\BillTypeRepository::class, \Republicas\Repositories\Eloquent\BillTypeRepositoryEloquent::class);
        $this->app->bind(\Republicas\Contracts\Repositories\PhotoRepository::class, \Republicas\Repositories\Eloquent\PhotoRepositoryEloquent::class);
        $this->app->bind(\Republicas\Contracts\Repositories\NotificationRepository::class, \Republicas\Repositories\Eloquent\NotificationRepositoryEloquent::class);
    }
}
