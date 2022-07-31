<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesai extends Model
{
    use HasFactory;
    
    protected $table = 'mesais';
    protected $guarded = [];

    public function getUser(){
        return $this->hasOne('App\Models\User','id','personel_id');
    }
}
