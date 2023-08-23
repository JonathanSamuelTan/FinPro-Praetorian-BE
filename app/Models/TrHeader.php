<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class TrHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'invoice',
        'address',
        'post',
    ];

    public function trDetails()
    {
        return $this->hasMany(TrDetail::class, 'invoice', 'invoice');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'email', 'email');
    }
}
