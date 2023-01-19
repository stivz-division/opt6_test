<?php

namespace App\Http\Controllers;

use App\DTOs\Company\CreateCompanyDTO;
use App\DTOs\Company\CreateEmployeeDTO;
use App\Http\Requests\CompanyCreateFormRequest;
use App\Http\Requests\CompanyUpdateFormRequest;
use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryContract;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct(
        private CompanyRepositoryContract $companyRepository,
        private CompanyServiceContract    $companyService,
    )
    {
    }

    public function index()
    {
        $companies = $this->companyRepository->pagination();

        return view('company.index', compact(
            'companies'
        ));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyCreateFormRequest $request)
    {
        $this->companyService->create(
            CreateCompanyDTO::makeFromRequest($request)
        );

        return redirect()->route('admin.companies.index')->with(['success' => __('Компания добавлена')]);
    }

    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(CompanyUpdateFormRequest $request, Company $company)
    {
        $this->companyService->update(
            CreateCompanyDTO::makeFromRequest($request),
            $company
        );

        return redirect()->route('admin.companies.show', $company)->with(['success', __('Данные изменены')]);
    }

    public function destroy(Company $company)
    {
        $this->companyService->delete($company);

        return redirect()->route('admin.companies.index');
    }
}
