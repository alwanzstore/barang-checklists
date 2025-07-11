<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityLog extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'aktivitas',
    ];

    /**
     * Relasi ke user yang melakukan aktivitas.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
