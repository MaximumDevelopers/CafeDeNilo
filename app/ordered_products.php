<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordered_products extends Model
{
    protected $table = 'ordered_products';
    protected $primaryKey = 'id';
    protected $timeStamps = true;

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
