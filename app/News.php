<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table='_news';
    protected $fillable=
        [    'id','title' ,'category_id','summary','detalis','published','image'];
    public function category(){
        return $this->belongsTo('App\Category');
    }

}
