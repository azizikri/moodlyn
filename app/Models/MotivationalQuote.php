<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotivationalQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'author',
        'category',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get a random motivational quote
     */
    public static function getRandomQuote()
    {
        return self::where('is_active', true)->inRandomOrder()->first();
    }

    /**
     * Get quotes by category
     */
    public static function getByCategory($category)
    {
        return self::where('is_active', true)
            ->where('category', $category)
            ->inRandomOrder()
            ->first();
    }
}
