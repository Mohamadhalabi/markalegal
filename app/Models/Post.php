<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table ='orders';

    protected $fillable=[
        'brand_name',
        'number_of_classes',
        'contact_name',
        'contact_email',
        'contact_telephone',
        'name',
        'tc',
        'email',
        'telephone',
        'address',
        'price',
    ];
}
