<?php

namespace App\Providers;

use App\Services\CompanyService;
use App\Services\Contracts\CompanyServiceContract;
use App\Services\Contracts\EmployeeServiceContract;
use App\Services\EmployeeService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public $singletons = [
        CompanyServiceContract::class => CompanyService::class,
        EmployeeServiceContract::class => EmployeeService::class
    ];
}
