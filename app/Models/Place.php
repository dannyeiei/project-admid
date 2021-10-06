<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable =[
        'place_name',
        'name',
        'event_name',
        'des_place',
        'time',
        'time2',
        'tel',
        
        'province',
        'district',
        'sub_district',

        'lat',
        'lng',

        'place_image',
        'place_image2',
        'place_image3',
        'place_image4',
        'place_image5',
        'place_image6'

        
    ];
    public function placeType(){
        return $this->hasOne(Type::class,'id','name');
    }
}
