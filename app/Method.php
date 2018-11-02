<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Method extends Model{
	public $table = 'method';

	protected $fillable = ['name', 'picture', 'type', 'atasnama', 'rek'];

	public $timestamps = false;
}