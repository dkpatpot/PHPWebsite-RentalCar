<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;

    public function promotionCodes() {
        return $this->hasMany(PromotionCode::class);
    }

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }

    public function scopeNotActive($query) {
        return $query->where('status', 'expried');
    }
}
