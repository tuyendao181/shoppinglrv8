<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
	protected $fillable=['image','descriptions','heading','created_at','updated_at'];
    public function scopelist_Slider($query){
        $query= $query -> get();
        return $query;
    }
    public function scopeadd_Slider($query,$image){
        $query = $query->create([
            'descriptions'=> request()->description,
            'heading'=> request()->heading,
            'image'=> $image
        ]);
        return $query;
    }

    public function scopedelete_Slider($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

    public function scopeUpdate_Slider($query,$id,$image){
		$query=$query->find($id)->update([
            'descriptions'=> request()->description,
            'heading'=> request()->heading,
            'image'=> $image
                   
	    ]);
        return $query;
	}

    public function scopeFind_Slider($query,$id){
		$query = $query->where(['id'=>$id])->get();
	    return $query;
	}

}
