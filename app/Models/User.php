<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'Account';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'status',
        'phone',
        'created_at',
        'update_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeRegister($query){
		$query = $query->create(['name'=> request()->name,'phone'=>request()->phone,'email'=>request()->email,'password'=>bcrypt(request()->password)]);
	    return $query;
	}

    public function scopeUpdate_Account($query,$id,$avatar){
		$query=$query->find($id)->update([
                    'name'=>request('name'),
                    'phone'=>request('phone'),
                    // 'email'=>request('email'),
                    'password'=>bcrypt(request()->password),
                    'avatar'=>$avatar,
                    // 'image'=>$image,
                   
	    ]);
        return $query;
	}

    public function scopeList_Account($query){
		$query = $query->get();
	    return $query;
	}
    public function scopeTim_Account($query,$id){
		$query = $query->where(['id'=>$id])->get();
	    return $query;
	}
    public function scopeUnactive_account($query,$id){
		// $query = $query->find($id)->update(['status' => 1]);
        $query = $query->where(['status' => 1,'id'=>$id])->update(['status' => 0]);
	    return $query;
	}
    public function scopeActive_account($query,$id){
        $query = $query->where(['status' => 0,'id'=>$id])->update(['status' => 1]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopeAdmin_account($query,$id){
        $query = $query->where(['role' => 0,'id'=>$id])->update(['role' => 1]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopeUser_account($query,$id){
        $query = $query->where(['role' => 1,'id'=>$id])->update(['role' => 0]);
        // $query = $query->find($id)->update(['status' => 0]);
	    return $query;
	}

    public function scopeDelete_account($query,$id){
        $query=$query->find($id);
        $query->delete();
	    return $query;
	}

    public function scopeSearch_account($query,$name){
        $query=$query->where('name','LIKE','%'.$name.'%')->get();
	    return $query;
	}

}
