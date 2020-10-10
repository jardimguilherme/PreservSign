<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit_card extends Model
{
    protected $fillable = [
        'card_number', 'payment_id', 'security_number', 'expires_date', 'card_name'
    ];
}
