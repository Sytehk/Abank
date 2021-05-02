<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wmethod extends Model
{
    protected $guarded = ['id'];
	
	public function withdraw()
    {
        return $this->hasMany('App\Withdraw', 'id', 'wmethod_id');
    }
}
