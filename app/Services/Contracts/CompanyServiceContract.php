<?php

namespace App\Services\Contracts;

use App\DTOs\Company\CreateCompanyDTO;
use App\Models\Company;

interface CompanyServiceContract
{
    public function delete(Company $company): void;
    public function create(CreateCompanyDTO $companyDTO): Company;

    public function update(CreateCompanyDTO $companyDTO, Company $company);
}
