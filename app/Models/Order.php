<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';
    protected $fillable = [
        'brand_name',
        'number_of_classes',
        'contact_name',
        'contact_email',
        'contact_telephone',
        'buyer_name',
        'unvan',
        'tckn',
        'vergi_no',
        'email',
        'telephone',
        'address',
        'price',
        'status',
        ];
    use HasFactory;
}
