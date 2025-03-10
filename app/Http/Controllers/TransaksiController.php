<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Exception;
use function Laravel\Prompts\alert;
class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required',
            'nama_pemilik_sertifikat' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'jenis_transaksi' => 'required',
            'nomor_akte' => 'required',
            'biaya' => 'required|numeric',
        ]);

        // Cek apakah pengguna dengan data tersebut sudah ada
        $pelanggan = Pelanggan::where('nama_pemohon', $request->nama_pemohon)
            ->where('nama_pemilik_sertifikat', $request->nama_pemilik_sertifikat)
            ->where('telp', $request->telp)
            ->where('alamat', $request->alamat)
            ->first();

        // Jika user tidak ditemukan, buat user baru
        if (!$pelanggan) {
            $pelanggan = Pelanggan::create([
                'nama_pemohon' => $request->nama_pemohon,
                'nama_pemilik_sertifikat' => $request->nama_pemilik_sertifikat,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
            ]);
        }

        // Buat transaksi dengan ID user yang ditemukan atau baru dibuat
        Transaksi::create([
            'pelanggan_id' => $pelanggan->id, // Menghubungkan transaksi dengan user
            'jenis_transaksi' => $request->jenis_transaksi,
            'nomor_akte' => $request->nomor_akte,
            'keterangan' => $request->keterangan,
            'status_proses' => 'PENDING',
            'biaya' => $request->biaya,
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil dibuat.');
    }

    public function index()
    {
        // Ambil semua data transaksi dari database
        $transactions = Transaksi::with('pelanggan')->latest()->get();

        // Kirim data ke view
        return view('read_transaction', compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transaksi::with('pelanggan')->findOrFail($id);
        return view('edit_transaction', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                // 'pelanggan_id' => 'required',
                'jenis_transaksi' => 'required',
                'nomor_akte' => 'required',
                'keterangan' => 'required',
                'biaya' => 'required|numeric',
            ]);
        } catch (Exception $e) {
            dd($e);

        }

        $transaction = Transaksi::findOrFail($id);
        $transaction->update($request->all());

        return redirect()->route('read.transactions')->with('success', 'Transaction updated successfully!');
    }


    public function delete(Request $request, $id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->delete();

        return redirect()->route('read.transactions')->with('success', 'Transaction Deleted successfully!');
    }

}