<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Company;

Route::get('/', function () 
{  
    $companies = Company::where('id', '>', 0)->get();
    return view('index', compact('companies'));
});



Route::get('company/create', 'CompanyController@create')->name("createCompany");
Route::post('companies', 'CompanyController@store');
Route::get('company/{company}/employees', 'CompanyController@employees')->name("showEmployees");
Route::get('company/{company}/{employee}/fire', 'CompanyController@fire')->name("fireEmployee");
Route::post('company/hire', 'CompanyController@hire')->name("hireEmployee");
Route::get('company/{employee}/delete', 'CompanyController@destroy')->name("destroyCompany");


Route::get('employees/create', 'EmployeeController@create')->name("createEmployee");
//Route::get('employees/{employee}/edit', 'EmployeeController@edit')->name("editEmployee");
Route::post('employees', 'EmployeeController@store');
Route::get('employees', 'EmployeeController@index');
Route::get('employees/{employee}/delete', 'EmployeeController@destroy')->name("destroyEmployee");


