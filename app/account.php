<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class account extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $timeStamps = true;

}
