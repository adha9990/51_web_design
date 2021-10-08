<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousesExtra extends Model
{
    use HasFactory;

    protected $table = 'houses_extra';
    protected $primaryKey = 'house_id';
    public $timestamps = false;
}
