<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    // use HasFactory;
    
    Protected $table = 'state';

    //Fillable property
    protected $fillable = ['state_name'];

    //relationship one-one
    public function personalDetail()
    {
        return $this->hasMany(PersonalDetail::class);
    }
    //community relationship 
    public function community()
    {
        return $this->hasMany(Community::class);
    }
}
