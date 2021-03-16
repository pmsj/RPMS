<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    Protected $table = 'district';
    //fillable
    protected $fillable = ['district_name'];

    public function personalDetail()
    {
        return $this->hasMany('App\Models\Backend\personalDetail');
    }

    //community relationship 
    public function community()
    {
        return $this->hasMany('App\Models\Backend\Community');
    }

}
