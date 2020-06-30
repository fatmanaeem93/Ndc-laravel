<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';


    protected $fillable=[
        'CountryName', 'CountryISO', 'CountryCode',  'population', 'area'
    ];
    public function cities(){
        return $this->hasMany('App\City');
    }

    public function news(){
        return $this->hasMany("App\News");
    }

}
