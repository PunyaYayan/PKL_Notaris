<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\Pengguna; // Pastikan model Pengguna sudah dibuat

class PelangganController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama_pemohon' => 'required|string',
            'nama_pemilik_sertifikat' => 'required|string',
            // 'password' => 'required|string|min:6',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Menyimpan data pengguna ke database
        $pelanggan = new Pelanggan();
        // $pengguna->name = $validated['name'];
        // $pengguna->email = $validated['email'];
        // $pengguna->password = bcrypt($validated['password']);
        $pelanggan->save();

        return redirect()->route('create.transaction.user')->with('success', 'Pengguna berhasil dibuat!');
    }
}