<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Contracts\EmployeeRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EmployeeRepository implements EmployeeRepositoryContract
{

    public function paginate(int $max = 15): LengthAwarePaginator
    {
        return Employee::query()->with('company')->latest()->paginate($max);
    }
}
