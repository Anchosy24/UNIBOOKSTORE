@extends('layouts.home')
@section('title', 'Data Buku')

@section('content')
<div class="container my-5">
    <div class="mb-3">
        <a href="{{ route('admin') }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-1"></i> Back to Admin
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h5 class="fw-bold mb-0">Data Buku</h5>
            <a class="btn btn-light btn-sm fw-semibold" href="{{ route('formBuku') }}">
                <i class="fas fa-plus-circle me-1"></i> Add Buku
            </a>
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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $key => $row)
                            <tr>
                                <td class="text-center">{{ $row->id }}</td>
                                <td class="text-center">{{ $row->kategori }}</td>
                                <td class="text-center">{{ $row->nama }}</td>
                                <td class="text-center">Rp. {{ number_format($row->harga, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $row->stok }}</td>
                                <td class="text-center">
                                    {{ $row->dataPenerbitBuku->nama }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('editBuku', $row->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('deleteBuku', $row->id) }}" method="POST" onsubmit="return confirmDelete(event)" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
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