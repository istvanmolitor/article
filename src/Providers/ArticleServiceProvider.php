<?php

namespace Molitor\Article\Providers;

use Illuminate\Support\ServiceProvider;
use Molitor\Article\Repositories\ArticleGroupRepository;
use Molitor\Article\Repositories\ArticleGroupRepositoryInterface;
use Molitor\Article\Repositories\ArticleRepository;
use Molitor\Article\Repositories\ArticleRepositoryInterface;
use Molitor\Article\Repositories\AuthorRepository;
use Molitor\Article\Repositories\AuthorRepositoryInterface;

class ArticleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'article');
    }

    public function register()
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ArticleGroupRepositoryInterface::class, ArticleGroupRepository::class);
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
    }
}
