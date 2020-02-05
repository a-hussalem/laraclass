<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 's_price', 'min_s_price', 'barcode',
    ];

    protected $guarded = [];


    public function category(){
        $this->belongsToMany('App\Category');
    }
}
