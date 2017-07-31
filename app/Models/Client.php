<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'ico',
        'dic',
        'icdhp',
        'email_address',
        'website_url',
        'phone_number',
    ];

    // relationships
    public function Invoice()
    {
        return $this->hasMany(\App\Models\Invoice::class,'invoices_id');
    }
}
