@extends('layouts.admin')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Transaction') }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Pelanggan ID</label>
            <input type="text" name="pelanggan_id" class="form-control" value="{{ $transaction->pelanggan_id }}" required>
        </div>

        <div class="form-group">
            <label>Jenis Transaksi</label>
            <input type="text" name="jenis_transaksi" class="form-control" value="{{ $transaction->jenis_transaksi }}"
                required>
        </div>

        <div class="form-group">
            <label>Nomor Akte</label>
            <input type="text" name="nomor_akte" class="form-control" value="{{ $transaction->nomor_akte }}" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required>{{ $transaction->keterangan }}</textarea>
        </div>

        <div class="form-group">
            <label>Status Proses</label>
            <select name="status_proses" class="form-control">
                <option value="pending" {{ $transaction->status_proses == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $transaction->status_proses == 'completed' ? 'selected' : '' }}>Completed
                </option>
            </select>
        </div>

        <div class="form-group">
            <label>Biaya</label>
            <input type="number" name="biaya" class="form-control" value="{{ $transaction->biaya }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('read.transactions') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection