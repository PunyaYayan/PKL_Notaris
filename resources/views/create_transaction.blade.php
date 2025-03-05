@extends('layouts.admin')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">{{ __('Create Transaction & User') }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('create-transaction-user.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- Create Transaction Form -->
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-1imary">Create Transaction</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pemohon">Nama Pemohon</label>
                                    <input type="text" name="nama_pemohon" class="form-control" placeholder="Nama Pemohon"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik_sertifikat">Nama Pemilik Sertifikat</label>
                                    <input type="text" name="nama_pemilik_sertifikat" class="form-control"
                                        placeholder="Nama Pemilik Sertifikat" required>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomor HP</label>
                                    <input type="text" name="telp" class="form-control" placeholder="Nomor HP" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_transaksi">Jenis Transaksi</label>
                                    <select name="jenis_transaksi" class="form-control" required>
                                        <option value="hak_milik">Hak Milik</option>
                                        <option value="nomor_akte">Nomor Akte</option>
                                        <!-- Add more options if needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_akte">Nomor Sertifikat / Akte</label>
                                    <input type="text" name="nomor_akte" class="form-control"
                                        placeholder="Nomor Sertifikat / Akte" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="1"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="biaya">Biaya Transaksi</label>
                                    <input type="number" name="biaya" class="form-control" placeholder="Biaya Transaksi"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary btn-block">Create Transaction & User</button>
    </form>
@endsection