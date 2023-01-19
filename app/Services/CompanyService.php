<?php

namespace App\Services;

use App\Actions\Company\DeleteLogoCompanyAction;
use App\DTOs\Company\CreateCompanyDTO;
use App\Models\Company;
use App\Services\Contracts\CompanyServiceContract;

class CompanyService implements CompanyServiceContract
{

    public function delete(Company $company): void
    {
        DeleteLogoCompanyAction::handle($company);

        $company->delete();
    }

    public function create(CreateCompanyDTO $companyDTO): Company
    {
        return Company::query()->create([
            'name' => $companyDTO->name,
            'email' => $companyDTO->email,
            'logo' => $companyDTO->logo?->store('companies/' . now()->toDateString(), 'images'),
            'address' => $companyDTO->address,
            'coordinates' => $companyDTO->coordinates,
        ]);
    }

    public function update(CreateCompanyDTO $companyDTO, Company $company)
    {
        return $company->update([
            'name' => $companyDTO->name,
            'email' => $companyDTO->email,

            'logo' => !is_null($companyDTO->logo) ?
                $companyDTO->logo->store('companies/' . now()->toDateString(), 'images') :
                $company->logo,

            'address' => $companyDTO->address,
            'coordinates' => $companyDTO->coordinates,
        ]);
    }
}
