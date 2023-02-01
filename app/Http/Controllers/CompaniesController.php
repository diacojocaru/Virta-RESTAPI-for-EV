<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\CompanyCollection;
use App\Models\Company;
use App\Services\CompanyService;

class CompaniesController extends Controller
{
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $paginatedCompanies = $this->companyService->paginatedList();

        return new CompanyCollection($paginatedCompanies);
    }

    public function store(StoreCompany $request)
    {
        $dto = $request->dto();

        $company = $this->companyService->create($dto);

        return new CompanyResource($company);
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(UpdateCompany $request, Company $company)
    {
        $dto = $request->dto();

        $this->companyService->update($company, $dto);

        return new CompanyResource($company);
    }

    public function destroy(Company $company)
    {
        $this->companyService->delete($company);

        return response()->json([]);
    }
}
