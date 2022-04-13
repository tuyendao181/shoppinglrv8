<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'color';
	protected $fillable=['name_color'];
    public function scopelist_Color($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Color($query){
        $query = $query->create([
            'name_color'=> request()->name_color,
        ]);
        return $query;
    }
    public function scopedelete_Color($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

}
