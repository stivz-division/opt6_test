<?php

namespace App\Providers;

use App\Repositories\CompanyRepository;
use App\Repositories\Contracts\CompanyRepositoryContract;
use App\Repositories\Contracts\EmployeeRepositoryContract;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public $singletons = [
        CompanyRepositoryContract::class => CompanyRepository::class,
        EmployeeRepositoryContract::class => EmployeeRepository::class
    ];
}
