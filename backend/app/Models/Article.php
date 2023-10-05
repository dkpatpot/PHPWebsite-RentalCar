<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeAdvertise($query)
    {
        return $query->where('like_count', '<', 1000)
            ->where('view_count', '>', 70000);
    }
    // public function viewCount() : Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $this->numberToK($value)
    //     );
    // }
    // public function likeCount() : Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $this->numberToK($value)
    //     );
    // }
    public function uploadImage()
    {
        return $this->hasMany(uploadImage::class);
    }
    // public function scopePopular($query, $like_count, $view_count)
    // {
    //     return $query->where('like_count', '>=', $like_count)
    //         ->where('view_count', '>=', $view_count);
    // }

    // public function scopeFilterTitle($query, $search)
    // {
    //     return $query->where('title', 'LIKE', "%{$search}%"); // % wildcard
    // }

    // private function numberToK($value) {
    //     return ($value >= 1000000)
    //         ? round($value / 1000000, 1) . 'm'
    //         : (
    //         ($value >= 1000)
    //             ? round($value / 1000, 1) . 'k'
    //             : $value
    //         );
    // }
}
