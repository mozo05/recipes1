<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // Nothing is guarded, therfore allowing each element of each recipe to be updated.
    protected $guarded = [];


}
