<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserChecklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'barang_checklist_id',
        'status',
        'catatan',
    ];

    /**
     * Relasi ke user yang memiliki checklist.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Relasi ke barang checklist.
     */
    public function barangChecklist()    {
        return $this->belongsTo(BarangChecklist::class, 'barang_checklist_id');
    }
}
