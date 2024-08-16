<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmailTemplateRepository;
use App\Repositories\SentEmailRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmailTemplateRepository::class, function ($app) {
            return new EmailTemplateRepository();
        });
        $this->app->bind(SentEmailRepository::class, function ($app) {
            return new SentEmailRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
