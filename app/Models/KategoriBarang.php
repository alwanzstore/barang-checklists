<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    /**
     * Relasi ke barang_checklists (one-to-many).
     */
    public function barangChecklists()
    {
        return $this->hasMany(BarangChecklist::class, 'kategori_barang_id');
    }
}
