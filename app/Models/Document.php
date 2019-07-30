<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false;
 
    protected $fillable = [
       "id", "name", "description", "place", "state", "year_of_creation"
    ];

 
    protected $hidden = [
        
    ];
}
