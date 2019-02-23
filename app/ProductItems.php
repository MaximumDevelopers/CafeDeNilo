<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    protected $table = 'product_items';
    protected $primaryKey = 'id';
    protected $timeStamps = true;
}
