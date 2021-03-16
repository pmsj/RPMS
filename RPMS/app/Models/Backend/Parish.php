<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    // use HasFactory;

    Protected $table = 'parish';

    //fillable fileds
    protected $fillable = ['parish_name', 'zone'];
}
