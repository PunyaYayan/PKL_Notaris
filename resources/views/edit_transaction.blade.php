@extends('layouts.admin')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Transaction & User') }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Transaction</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pemohon">Nama Pemohon</label>
                                    <input type="text" name="nama_pemohon" class="form-control"
                                        value="{{ $transaction->pelanggan->nama_pemohon }}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik_sertifikat">Nama Pemilik Sertifikat</label>
                                    <input type="text" name="nama_pemilik_sertifikat" class="form-control"
                                        value="{{ $transaction->pelanggan->nama_pemilik_sertifikat }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="telp">Nomor HP</label>
                                    <input type="text" name="telp" class="form-control"
                                        value="{{ $transaction->pelanggan->telp }}" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ $transaction->pelanggan->alamat }}" required readonly>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_transaksi">Jenis Transaksi</label>
                                    <select name="jenis_transaksi" class="form-control" required>
                                        <option value="hak_milik" {{ $transaction->jenis_transaksi == 'hak_milik' ? 'selected' : '' }}>Hak Milik</option>
                                        <option value="nomor_akte" {{ $transaction->jenis_transaksi == 'nomor_akte' ? 'selected' : '' }}>Nomor Akte</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_akte">Nomor Sertifikat / Akte</label>
                                    <input type="text" name="nomor_akte" class="form-control"
                                        value="{{ $transaction->nomor_akte }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="1"
                                        required>{{ $transaction->keterangan }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="biaya">Biaya Transaksi</label>
                                    <input type="number" name="biaya" class="form-control" value="{{ $transaction->biaya }}"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update Transaction & User</button>
    </form>
@endsection