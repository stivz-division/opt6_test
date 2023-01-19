<?php

namespace App\DTOs\Employee;

use App\Http\Requests\CompanyCreateFormRequest;
use App\Http\Requests\CompanyUpdateFormRequest;
use App\Http\Requests\EmployeeCreateFormRequest;
use App\Http\Requests\EmployeeUpdateFormRequest;
use Illuminate\Http\UploadedFile;

class CreateEmployeeDTO
{
    public function __construct(
        public readonly string $name,
        public readonly int $company_id,
        public readonly ?string $email = null,
        public readonly ?string $phone = null,
    )
    {
    }

    public static function makeFromRequest(EmployeeCreateFormRequest|EmployeeUpdateFormRequest $employeeCreateFormRequest): self
    {
        return new self(
            $employeeCreateFormRequest->input('name'),
            $employeeCreateFormRequest->input('company_id'),
            $employeeCreateFormRequest->input('email'),
            $employeeCreateFormRequest->input('phone'),
        );
    }
}
