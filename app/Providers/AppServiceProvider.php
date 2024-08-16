<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmailTemplateRepository;
use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use App\Repositories\SentEmailRepository;
use App\Repositories\Interfaces\SentEmailRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmailTemplateRepositoryInterface::class, EmailTemplateRepository::class);
        $this->app->bind(SentEmailRepositoryInterface::class, SentEmailRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
