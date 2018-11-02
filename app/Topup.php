<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    public $table = 'topup';

    protected $fillable = ['date', 'id_user', 'id_method', 'coin', 'price', 'status', 'id_payment', 'pay'];

    public $timestamps = false;

    public function method()
    {
        return $this->belongsTo('App\Method', 'id_method', 'id');
    }
}