<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Menyebutkan nama tabel (optional, jika tidak sesuai dengan nama tabel default)
    protected $table = 'pelanggan';  // Pastikan ini sesuai dengan nama tabel di database

    // Menyebutkan kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama_pemohon',
        'nama_pemilik_sertifikat',
        'telp',
        'alamat',
    ];

    // Definisikan relasi antara Pelanggan dan Transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);  // Setiap pelanggan bisa memiliki banyak transaksi
    }
}
