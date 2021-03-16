<?php

namespace App\Models\Backend;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    // use HasFactory;

    Protected $table = 'ministry';

    protected $fillable = ['ministry_name'];
}
