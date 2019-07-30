<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class share extends Model
{
     
    public $timestamps = false;
    protected $fillable = [
        'document_id','user_id','first_name','surname','pesel','phone','date_of_share','date_of_return',
    ];

    
    public function document(){
        
            return $this->belongsTo(Document::class,'document_id');
    }
    
    public function user(){
        
            return $this->belongsTo(User::class,'user_id');
    }
}
