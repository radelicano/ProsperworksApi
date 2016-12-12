<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employees';
	protected $fillable =['emp_id','name','email'];

	public function logs()
	{
		return $this->hasMany(Logs::class);
	}

}
