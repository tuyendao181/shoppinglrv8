<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
	protected $fillable=['name','image','status','created_at','updated_at'];
    public function scopelist_Category($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Category($query,$image){
        $query = $query->create([
            'name'=> request()->name,
            'image'=> $image
        ]);
        return $query;
    }

    public function scopeactive_Category($query,$id){
        $query = $query->where(['status' => 0,'id'=>$id])->update(['status' => 1]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopereject_Category($query,$id){
        $query = $query->where(['status' => 1,'id'=>$id])->update(['status' => 0]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopedelete_Category($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

    public function scopeFind_Category($query,$id){
		$query = $query->where(['id'=>$id])->get();
	    return $query;
	}

    public function scopeUpdate_Category($query,$id){
		$query=$query->find($id)->update([
                    'name'=>request('name'),
                   
	    ]);
        return $query;
	}

    public function scopeSearch_category($query,$name){
        $query=$query->where('name','LIKE','%'.$name.'%')->get();
	    return $query;
	}
}
