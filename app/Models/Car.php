<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    public function inquiries(){
        return $this->hasMany('App\Models\Inquiry');
    }

    protected $fillable = [
        'make', 'model', 'engine', 'year', 'mileage', 'price',
    ];
}
