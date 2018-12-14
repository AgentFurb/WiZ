<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function cat()
    {
        return $this->hasone(Cat::class);
    }

}
