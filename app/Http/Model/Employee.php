<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table='employee';
    protected $primaryKey = 'id';
    public $timestamps=false;
}
