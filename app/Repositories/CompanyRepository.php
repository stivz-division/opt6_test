<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository implements CompanyRepositoryContract
{

    public function pagination(int $max = 5): LengthAwarePaginator
    {
        return Company::query()->latest()->paginate($max);
    }

    public function all(): Collection
    {
        return Company::query()->get(['id', 'name']);
    }
}
