<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TrDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'invoice',
        'product_id',
        'qtc',
    ];

    public function trHeader(): HasOne
    {
        return $this->hasOne(TrHeader::class, 'id', 'transaction_id');
    }

   
}
