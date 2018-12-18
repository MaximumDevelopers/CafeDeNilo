<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    protected $table = 'item_lists';
    protected $primaryKey = 'id';
    protected $timeStamps = true;
}
