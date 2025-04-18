@extends('layouts.home')
@section('title', isset($buku) ? 'Edit Buku' : 'Tambah Buku')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center mb-4 fw-bold text-primary">{{ isset($buku) ? 'Edit Buku' : 'Tambah Buku' }}</h2>
            
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-semibold">{{ isset($buku) ? 'Form Edit Buku' : 'Form Tambah Buku' }}</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ isset($buku) ? route('updateBuku', $buku->id) : route('addBuku') }}" method="POST" class="equipment-form">
                        @csrf
                        @if(isset($buku))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="id" class="form-label fw-semibold">ID Buku</label>
                            <input type="text" class="form-control" id="id" name="id" pattern="[A-Z]{2}[0-9]{3}" placeholder="Masukkan ID Buku (contoh: AB123)" 
                                value="{{ old('id', $buku->id ?? '') }}" 
                                {{ isset($buku) ? 'readonly' : '' }} 
                                title="ID Buku harus terdiri dari 2 huruf besar di awal dan 3 angka di akhir">
                            <small class="text-muted">Format: 2 huruf kapital diikuti 3 angka</small>
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label fw-semibold">Kategori Buku</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Buku" value="{{ old('kategori', $buku->kategori ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama Buku</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Buku" value="{{ old('nama', $buku->nama ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label fw-semibold">Harga Buku</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Buku" value="{{ old('harga', $buku->harga ?? '') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label fw-semibold">Stok Buku</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Buku" value="{{ old('stok', $buku->stok ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="id_penerbit" class="form-label fw-semibold">Penerbit</label>
                            <select id="id_penerbit" name="id_penerbit" class="form-select" required>
                                <option value="" disabled selected>--- Pilih Penerbit ---</option>
                                @foreach ($penerbit as $a)
                                <option value="{{ $a->id }}" {{ (isset($buku) && $buku->id_penerbit == $a->id) ? 'selected' : '' }}>{{ $a->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex mt-4 gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fas fa-save me-1"></i> {{ isset($buku) ? 'Update' : 'Simpan' }}
                            </button>
                            <a href="{{ route('indexBuku')}}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection