<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    Protected $table = 'country';

    //Fillable property
    protected $fillable = ['country_name', 'country_abbreviation'];

    //relationship one-one
    public function personalDetail()
    {
        return $this->belongsTo('App\Models\PersonalDetail');
    }

    //community relationship 
    public function community()
    {
        return $this->hasMany('App\Models\Backend\Community');
    }

  
}
