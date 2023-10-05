<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'redeemed_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }

    public function isRedeemed() {
        return $this->redeemed_at === null;
    }

    public function scopeRedeemed($query) {
        return $query->whereNotNull('redeemed_at');
    }

    public function scopeAvailable($query) {
        return $query->whereNull('redeemed_at');
    }
}
