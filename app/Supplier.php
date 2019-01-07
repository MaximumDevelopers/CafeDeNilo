<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use Notifiable;
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $timeStamps = true;
}
