<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'entry_date',
    ];

    protected $casts = [
        'entry_date' => 'date',
    ];

    /**
     * Get the user that owns the journal entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get truncated content for previews
     */
    public function getTruncatedContent($length = 100)
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->content), $length);
    }
}
