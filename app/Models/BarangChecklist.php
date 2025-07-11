<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangChecklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'kategori_barang_id',
        'foto',
    ];

    /**
     * Relasi ke kategori barang (many-to-one)w.
     */
    public function kategori() 
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id');
    }

    /**
     * Relasi ke checklist user (one-to-many).
     */
    public function userChecklists()
    {
        return $this->hasMany(UserChecklist::class);
    }
}
