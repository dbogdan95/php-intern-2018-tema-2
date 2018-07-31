<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = ['company_id', 'name']; 

    public function Company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
