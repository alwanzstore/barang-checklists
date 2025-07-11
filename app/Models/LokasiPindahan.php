<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LokasiPindahan extends Model
{
    use HasFactory;

    protected $table = 'lokasi_pindahan';

    protected $fillable = [
        'nama_lokasi',
        'alamat',
        'user_id',
    ];

    /**
     * Relasi ke model User (Setiap lokasi dimiliki oleh 1 user).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke checklist pengguna (jika checklist punya lokasi_pindahan_id).
     */
    public function userChecklists()
    {
        return $this->hasMany(UserChecklist::class);
    }
}
