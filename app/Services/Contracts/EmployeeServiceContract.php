<?php

namespace App\Services\Contracts;

use App\DTOs\Employee\CreateEmployeeDTO;
use App\Models\Employee;

interface EmployeeServiceContract
{
    public function create(CreateEmployeeDTO $createEmployeeDTO): Employee;

    public function update(CreateEmployeeDTO $createEmployeeDTO, Employee $employee);

    public function delete(Employee $employee);
}
