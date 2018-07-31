<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = ['name', 'description']; 

    public function getEmployees()
    {
        return Employee::where('company_id', '=', $this->getKey())->get();
    }
}
