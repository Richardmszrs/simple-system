<?php

namespace App\Models;

use App\Traits\CurrencyTrait;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use CurrencyTrait;

    protected $table = 'invoices';

    protected $fillable = [
        'clients_id',
        'amount',
        'name',
        'descripton'
    ];

    // relationships
    public function client()
    {
        return $this->hasOne(\App\Models\Client::class, 'id', 'clients_id');
    }

    // attributes
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

}
