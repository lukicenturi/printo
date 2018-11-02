<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Prints extends Model{
	public $table = 'print';

	public $fillable = ['date','kode','source','original','size','copies','status','deliver','address','city','province','postal_code','id_user','pages','coin', 'id_partner'];

	public $timestamps = false;

	public function paper(){
		return $this->belongsTo(Paper::class,'size','id');
	}

	public function partner(){
	    return $this->belongsTo(User::class, 'id_partner', 'id');
    }
}