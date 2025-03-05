<?php
namespace App\Models;

use App\Http\Controllers\TransaksiController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Menyebutkan nama tabel (optional, jika tidak sesuai dengan nama tabel default)
    protected $table = 'transaksi';  // Pastikan ini sesuai dengan nama tabel di database

    // Menyebutkan kolom-kolom yang bisa diisi
    protected $fillable = [
        'pelanggan_id',
        'jenis_transaksi',
        'nomor_akte',
        'keterangan',
        'status_proses',
        'biaya',
    ];

    // Definisikan relasi antara Transaksi dan Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);  // Setiap transaksi milik satu pelanggan
    }
}
