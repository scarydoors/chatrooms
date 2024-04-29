<?php

namespace App\Providers;

use App\Repositories\ChatroomRepository;
use App\Repositories\ChatroomRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChatroomRepositoryInterface::class, ChatroomRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
