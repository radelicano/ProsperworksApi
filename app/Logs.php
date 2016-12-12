<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
	protected $table = 'table_logs';
	protected $fillable =['id','emp_id','hours','date_logged'];

	public function employees() {

		return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
	}
	public $timestamps = false;
}
