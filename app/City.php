<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table="cities";
    protected $fillable=[
        'Name',
        'Country_Id',
       'Latlng' ,
       'active' ,
    ];
    public function News(){
        return $this->belongsTo('App\News','category_id','id');
    }
}
