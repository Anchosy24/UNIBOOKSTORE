@extends('layouts.home')
@section('title', 'Laporan Pengadaan')

@section('content')
<div class="container my-5">
    <div class="mb-3">
        <a href="{{ route('cetak') }}" class="btn btn-primary" target="_blank">
            <i class="fas fa-file-pdf me-1"></i> Cetak Laporan
        </a>
    </div>

    <div class="card shadow-sm mt-2 mb-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h5 class="fw-bold mb-0">Data Stok Buku yang Menipis</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle" id="tabel">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">ID Buku</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Nama Buku</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stokTipis as $key => $row)
                            <tr>
                                <td class="text-center">{{ $row->id }}</td>
                                <td class="text-center">{{ $row->kategori }}</td>
                                <td class="text-center">{{ $row->nama }}</td>
                                <td class="text-center">Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $row->stok }}</td>
                                <td class="text-center">
                                    {{ $row->dataPenerbitBuku->nama }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm my-5">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h5 class="fw-bold mb-0">Data Buku yang Baru Ditambahkan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle" id="tabel">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">ID Buku</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Nama Buku</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukuTerbaru as $key => $row)
                            <tr>
                                <td class="text-center">{{ $row->id }}</td>
                                <td class="text-center">{{ $row->kategori }}</td>
                                <td class="text-center">{{ $row->nama }}</td>
                                <td class="text-center">Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $row->stok }}</td>
                                <td class="text-center">
                                    {{ $row->dataPenerbitBuku->nama }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection