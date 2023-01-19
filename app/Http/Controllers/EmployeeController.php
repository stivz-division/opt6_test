<?php

namespace App\Http\Controllers;

use App\DTOs\Employee\CreateEmployeeDTO;
use App\Http\Requests\EmployeeCreateFormRequest;
use App\Http\Requests\EmployeeUpdateFormRequest;
use App\Models\Employee;
use App\Repositories\Contracts\CompanyRepositoryContract;
use App\Repositories\Contracts\EmployeeRepositoryContract;
use App\Services\Contracts\EmployeeServiceContract;

class EmployeeController extends Controller
{
    public function __construct(
        private CompanyRepositoryContract  $companyRepository,
        private EmployeeRepositoryContract $employeeRepository,
        private EmployeeServiceContract    $employeeService,
    )
    {
    }

    public function index()
    {
        $employees = $this->employeeRepository->paginate();

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $companies = $this->companyRepository->all();

        return view('employee.create', compact('companies'));
    }

    public function store(EmployeeCreateFormRequest $request)
    {
        $this->employeeService->create(
            CreateEmployeeDTO::makeFromRequest($request)
        );

        return redirect()->route('admin.employees.index')->with(['success' => __('Сотрудник добавлен')]);
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = $this->companyRepository->all();

        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeUpdateFormRequest $request, Employee $employee)
    {
        $this->employeeService->update(
            CreateEmployeeDTO::makeFromRequest($request),
            $employee
        );

        return redirect()->route('admin.employees.show', $employee)->with(['success' => __('Данные изменены')]);
    }

    public function destroy(Employee $employee)
    {
        $this->employeeService->delete($employee);

        return redirect()->route('admin.employees.index')->with(['success' => __('Сотрудник удален')]);
    }
}
