<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        /* METODO 1:
        $company=Company::create([
             'name'=> $request->input("name")
         ]);

        */
        //metodo 2 (PREFERIBILE)
        $company = new Company();
        $company->fill($request->all());
        $company->save();

        return $company;

    }

    public function show(Request $request, Company $company)
    {
        return $company->load('employees');
    }

    public function index(Request $request)
    {
        $allCompanies = Company::query()->where('field', $request->input("field"))->get();
        return $allCompanies;
    }

    public function update(Request $request, Company $company)
    {
        $company->fill($request->all());
        $company->save();
        return $company;
    }

    public function destroy(Request $request, Company $company)
    {
        return $company->delete();
    }

    public function stateCompany(Request $request, string $state)
    {
        return Company::query()
            ->where('state', $state)
            ->get();
    }

    public function statoAzienda(Request $request)
    {
        return Company::query()
            ->where('state', $request->input('state'))->get();
    }



}
