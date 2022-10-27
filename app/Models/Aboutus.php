<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "aboutus"; // error in name in migration so changed defult table name
}
