<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    public function cat()
    {
        return $this->hasone(Cat::class);
    }

    public function Pimage()
    {
        return $this->hasone(Pimage::class);
    }

    public $timestamps = false;
    protected $table = 'overzicht';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Productcode fabrikant', 'GTIN product', 'Productomschrijving', 'Locatie', 'Fabrikaat', 'Productserie', 'Producttype', 'updated_at', 'imagelink',
    ];


}
