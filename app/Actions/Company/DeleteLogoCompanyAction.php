<?php

namespace App\Actions\Company;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class DeleteLogoCompanyAction
{
    public static function handle(Company $company): void
    {
        $storage = Storage::disk('images');

        if ($storage->exists($company->logo)) {
            $storage->delete($company->logo);
        }
    }
}
