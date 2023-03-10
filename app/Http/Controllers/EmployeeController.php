<?php

namespace App\Http\Controllers;

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

        return $employee->load('company');
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

    public function collegue(Request $request, Employee $employee)
    {
        return Employee::query()
            ->where('company_id', '=', $employee->company_id)
            ->where('id', '!=', $employee->id)
            ->get();

    }

    public function employeeAge(Request $request, int $age1, int $age2)
    {
        return Employee::query()
            ->where('age', '>=', $age1)
            ->where('age', '<=', $age2)
            ->get();

    }

    public function filterEmployee(Request $request)
    {
        $data = Employee::query();
        $params = $request->all();

        /*
        if($request->has('role'))
            $data->where('role', $request->input('role'));
        if($request->has('age'))
            $data->where('age', $request->input('age'));
        if ($request->has('company_id'))
            $data->where('company_id', $request->input('company_id'));
*/
        foreach ($params as $key=> $value)
        {
            $data->where($key, $value);
        }

        return $data->get();

    }


}
