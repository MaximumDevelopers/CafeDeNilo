<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $timeStamps = true;

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
