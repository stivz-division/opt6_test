<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface EmployeeRepositoryContract
{
    public function paginate(int $max = 15): LengthAwarePaginator;
}
