<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoodEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mood',
        'cause',
        'entry_date',
    ];

    protected $casts = [
        'entry_date' => 'date',
    ];

    /**
     * Get the user that owns the mood entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Available mood options
     */
    public static function getMoodOptions()
    {
        return [
            'Happy' => '😊',
            'Sad' => '😢',
            'Anxious' => '😰',
            'Calm' => '😌',
            'Energetic' => '⚡',
            'Angry' => '😠',
            'Stressed' => '😣',
            'Grateful' => '🙏',
        ];
    }
}
