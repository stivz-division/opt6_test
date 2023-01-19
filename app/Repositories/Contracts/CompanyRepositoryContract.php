<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepositoryContract
{
    public function pagination(int $max = 5): LengthAwarePaginator;

    public function all(): Collection;
}
