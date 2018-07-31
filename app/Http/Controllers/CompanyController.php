<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class CompanyController extends Controller
{
	public function store(Request $request)
	{
		$this->validate(request(), [
			'name' => "required|max:64",
			'description' => "max:128"

		]);

	    Company::create(request(['name', 'description']));
	    return redirect(url('/'));
	}

    public function create()
    {
        return view("companies.create");
    }	

	public function destroy($id)
    {
        Company::destroy($id);
        return redirect(url('/'));
    }   

    public function employees(Company $company)
    {

        $employees = $company->getEmployees();
        $unemployeds = Employee::where("company_id", 0)->get();

        return view('companies.employees',[
        	'companyEmployees' => $employees,
        	'companyId' => $company->id,
        	'companyName' => $company->name, 
        	'unemployeds' => $unemployeds
        ]);
    }

    public function fire(Company $company, Employee $employee)
    {
		$employee->company_id = 0;
		$employee->save();

		return redirect(route('showEmployees', $company->id));
    }    

    public function hire(Request $request)
    {
    	$employee = Employee::findOrFail(request('employees'));
    	$company_id = request('company');

		$employee->company_id = $company_id;
		$employee->save();

		return redirect(route('showEmployees', $company_id));
    }   
}
