<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Budget extends Model
{
    use HasFactory;

    // belongs to Account
    protected $fillable=[
        'account_id',
        'name',
        'amount',
    ];

    public function account(): BelongsTo{
        return $this->belongsTo(Account::class);
    }

    public function spendings(){
        return $this->hasMany(Spending::class);
    }
}
