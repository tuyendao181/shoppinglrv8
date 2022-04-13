<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
   
    protected $table = 'Account';
	protected $fillable=['name','email ','password','role','status','remember_token','phone'];
    public function scopeRegister($query){
		$query = $query->create(['name'=> request()->name,'phone'=>request()->phone,'email'=>request()->email,'password'=>request()->password]);
	    return $query;
	}

}
