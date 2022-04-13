<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
	protected $fillable=['name','price','created_at','updated_at','sale_price','descriptions','status','category_id'];
    // public function cate(){
	// 	return $this -> hasOne(Category::class,'id','category_id');
	// }
    public function scopelist_Product($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Product($query){
        $query = $query->create([
        'name'=> request()->name,
        'price'=> request()->price,
        'sale_price'=> request()->price_sale,
        'descriptions'=> request()->description,
        'category_id' =>request()->category_id,
        
    ]);
        
        return $query;
    }

    public function scopeactive_Product($query,$id){
        $query = $query->where(['status' => 0,'id'=>$id])->update(['status' => 1]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopereject_Product($query,$id){
        $query = $query->where(['status' => 1,'id'=>$id])->update(['status' => 0]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopedelete_Product($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

    public function scopeFind_Product($query,$id){
		$query = $query->where(['id'=>$id])->get();
	    return $query;
	}

    public function scopeUpdate_Product($query,$id){
		$query=$query->find($id)->update([
            'name'=> request()->name,
            'price'=> request()->price,
            'sale_price'=> request()->price_sale,
            'descriptions'=> request()->description,
            'category_id' =>request()->category_id,        
	    ]);
        return $query;
	}

    public function scopeSearch_Product($query,$name){
        $query=$query->where('name','LIKE','%'.$name.'%')->get();
	    return $query;
	}
}
