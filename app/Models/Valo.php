<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valo extends Model
{
    use HasFactory;
    protected $table = "valo";
    protected $guarded = [];  
    public $timestamps = false;
}
