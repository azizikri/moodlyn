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
        $quote = self::where('is_active', true)->inRandomOrder()->first();

        // If no quotes exist, return a default one
        if (! $quote) {
            return (object) [
                'quote' => 'Every day is a new beginning. Take a deep breath and start again.',
                'author' => 'Unknown',
                'category' => 'motivation',
                'is_active' => true,
            ];
        }

        return $quote;
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
