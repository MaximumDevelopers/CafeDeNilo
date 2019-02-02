<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\ItemList;
class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $timeStamps = true;

    protected $fillable=['product_name'];
    
    public function ItemList()
    {
        return $this->belongsToMany('App\ItemList' , 'product_items')->withTimestamps();;
    }
}
