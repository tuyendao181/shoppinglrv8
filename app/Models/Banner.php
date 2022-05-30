<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
	protected $fillable=['image','created_at','updated_at'];
    public function scopelist_Banner($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Banner($query,$image){
        $query = $query->create([
            'image'=> $image
        ]);
        return $query;
    }

    public function scopedelete_Banner($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

    public function scopeUpdate_Banner($query,$id,$image){
		$query=$query->find($id)->update([
            'name'=> request()->name,
            'content'=> request()->content,
            'description'=> request()->description,
            'image'=> $image
                   
	    ]);
        return $query;
	}

    public function scopeFind_Banner($query,$id){
		$query = $query->where(['id'=>$id])->get();
	    return $query;
	}
}
