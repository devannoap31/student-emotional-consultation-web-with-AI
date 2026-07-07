<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'session_name',
        'user_id',
        'user_message',
        'ai_response',
        'risk_indicator',
        'total_score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
