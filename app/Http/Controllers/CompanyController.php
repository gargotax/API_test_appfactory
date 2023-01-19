<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
}
