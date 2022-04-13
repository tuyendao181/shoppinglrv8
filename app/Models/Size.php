<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  
    use HasFactory;
    protected $table = 'size';
	protected $fillable=['name_size'];
    public function scopelist_Size($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Size($query){
        $query = $query->create([
            'name_size'=> request()->name_size,
        ]);
        return $query;
    }
    public function scopedelete_Size($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}
}
