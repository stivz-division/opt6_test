<?php

namespace App\Services;

use App\DTOs\Employee\CreateEmployeeDTO;
use App\Models\Employee;
use App\Services\Contracts\EmployeeServiceContract;

class EmployeeService implements EmployeeServiceContract
{

    public function create(CreateEmployeeDTO $createEmployeeDTO): Employee
    {
        return Employee::query()->create([
            'name' => $createEmployeeDTO->name,
            'company_id' => $createEmployeeDTO->company_id,
            'email' => $createEmployeeDTO->email,
            'phone' => $createEmployeeDTO->phone,
        ]);
    }

    public function update(CreateEmployeeDTO $createEmployeeDTO, Employee $employee)
    {
        $employee->update([
            'name' => $createEmployeeDTO->name,
            'company_id' => $createEmployeeDTO->company_id,
            'email' => $createEmployeeDTO->email,
            'phone' => $createEmployeeDTO->phone,
        ]);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
