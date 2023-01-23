<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->fill($request->all());
        $employee->save();
        return $employee;
    }

    public function show(Request $request, Employee $employee)
    {
        //$response = Employee::query()->where('id', $employee)->first();
        //$response = Employee::find($employee);

        return $employee;
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->fill($request->all());
        $employee->save();
        return $employee;
    }

    public function destroy(Request $request, Employee $employee)
    {
        return $employee->delete();
    }
}
