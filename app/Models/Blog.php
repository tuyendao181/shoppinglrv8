<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
	protected $fillable=['name','image','content','description','created_at','updated_at'];
    public function scopelist_Blog($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Blog($query,$image){
        $query = $query->create([
            'name'=> request()->name,
            'content'=> request()->content,
            'description'=> request()->description,
            'image'=> $image
        ]);
        return $query;
    }

    public function scopedelete_Blog($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

    public function scopeUpdate_Blog($query,$id,$image){
		$query=$query->find($id)->update([
            'name'=> request()->name,
            'content'=> request()->content,
            'description'=> request()->description,
            'image'=> $image
                   
	    ]);
        return $query;
	}

    public function scopeFind_Blog($query,$id){
		$query = $query->where(['id'=>$id])->get();
	    return $query;
	}

}
