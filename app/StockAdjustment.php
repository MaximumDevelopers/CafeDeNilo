<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    protected $table = 'stock_adjustments';
    protected $primaryKey = 'id';
    protected $timeStamps = true;
}
