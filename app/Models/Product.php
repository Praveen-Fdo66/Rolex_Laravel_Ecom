<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;



class Product extends Eloquent{

    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = ['name', 'price', 'image'];
    
}