<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    // use HasFactory;

    Protected $table = 'institution';

    //fillables
    protected $fillable = ['institution_name','institution_place','institution_established_date'];
}
