<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{
    use HasFactory;
  
    protected $table = 'product_attributes';
	protected $fillable=['image','id_product','id_color','id_size'];

    public function scopeFind_ProductAttr($query,$id){
		$query = $query->where(['id_product'=>$id])->get();
	    return $query;
	}
	public function scopeadd_ProductAttr($query,$image){
        $query = $query->create([
        'id_product'=> request()->product,
        'id_color'=> request()->color,
        'id_size'=> request()->size,
        'image' =>$image, 
    ]);
        
        return $query;
    }

	public function scopedelete_ProductAttr($query,$id){
        $query=$query->where('id_atrr',$id);
        $query->delete();
	    return $query;
	}
   
}
