<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Expense\ExpenseRepository;
use App\Repositories\Expense\ExpenseRepositoryInterface;
use App\Repositories\Income\IncomeRepository;
use App\Repositories\Income\IncomeRepositoryInterface;
use App\Repositories\UserCategory\UserCategoryRepository;
use App\Repositories\UserCategory\UserCategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(IncomeRepositoryInterface::class, IncomeRepository::class);
        $this->app->bind(ExpenseRepositoryInterface::class, ExpenseRepository::class);
        $this->app->bind(UserCategoryRepositoryInterface::class, UserCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
