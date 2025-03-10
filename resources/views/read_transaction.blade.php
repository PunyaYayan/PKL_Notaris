@extends('layouts.admin')

@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">{{ __('Transaction & User') }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">List of Transactions</h5>
        </div>
        <a href="{{ route('create.transaction.user') }}" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> Create Transaction
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Transaksi</th>
                            <th>Nomor Akte</th>
                            <th>Keterangan</th>
                            <th>Status Proses</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $index => $transaction)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaction->pelanggan->nama_pemohon}}</td>
                                <td>{{ $transaction->jenis_transaksi }}</td>
                                <td>{{ $transaction->nomor_akte }}</td>
                                <td>{{ $transaction->keterangan }}</td>
                                <td>
                                    @if ($transaction->status_proses == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($transaction->status_proses == 'completed')
                                        <span class="badge badge-success">Completed</span>
                                    @else
                                        <span class="badge badge-secondary">{{ ucfirst($transaction->status_proses) }}</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($transaction->biaya, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit', $transaction->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('transactions.delete', $transaction->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection