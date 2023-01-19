<?php

namespace App\DTOs\Company;

use App\Http\Requests\CompanyCreateFormRequest;
use App\Http\Requests\CompanyUpdateFormRequest;
use Illuminate\Http\UploadedFile;

class CreateCompanyDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $email = null,
        public readonly ?UploadedFile $logo = null,
        public readonly ?string $address = null,
        public readonly ?string $coordinates = null,
    )
    {
    }

    public static function makeFromRequest(CompanyCreateFormRequest|CompanyUpdateFormRequest $companyCreateFormRequest): self
    {
        return new self(
            $companyCreateFormRequest->input('name'),
            $companyCreateFormRequest->input('email'),
            $companyCreateFormRequest->file('logo'),
            $companyCreateFormRequest->input('address'),
            $companyCreateFormRequest->input('coordinates'),
        );
    }
}
