<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $timeStamps = true;
    
    public function item_list()
    {
        return $this->belongsToMany(item_list::class);
    }
}
