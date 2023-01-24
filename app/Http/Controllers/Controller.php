<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function isCollegue(Request $request, Employee $employee1, Employee $employee2)
    {


        if ($employee1->company_id == $employee2->company_id) {
            return "sono colleghi, appartengono all'azienda " . $employee1->company->name;
        } else {
            return "non sono colleghi, ". $employee2->name . " appartiene all'azienda " . $employee2->company->name . "e " . $employee1->name . "appartiene all'azienda " . $employee1->company->name;
        }

    }


}
