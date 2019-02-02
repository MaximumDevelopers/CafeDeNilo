<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\ItemList;

class ItemList extends Model
{
    protected $table = 'item_lists';
    protected $primaryKey = 'id';
    protected $timeStamps = true;

    public function roduct()
    {
        return $this->belongsToMany(Products::class, 'product_items')->withTimestamps();;
    }
}
