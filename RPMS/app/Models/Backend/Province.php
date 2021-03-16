<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    // use HasFactory;
    
    Protected $table = 'Province';

    //Fillable property
    protected $fillable = ['province_name','province_abbreviation'];
}

