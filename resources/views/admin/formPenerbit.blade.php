@extends('layouts.home')
@section('title', isset($penerbit) ? 'Edit Penerbit' : 'Tambah Penerbit')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center mb-4 fw-bold text-primary">{{ isset($penerbit) ? 'Edit Penerbit' : 'Tambah Penerbit' }}</h2>
            
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-semibold">{{ isset($penerbit) ? 'Form Edit Penerbit' : 'Form Tambah Penerbit' }}</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ isset($penerbit) ? route('updatePenerbit', $penerbit->id) : route('addPenerbit') }}" method="POST" class="equipment-form">
                        @csrf
                        @if(isset($penerbit))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="id" class="form-label fw-semibold">ID Penerbit</label>
                            <input type="text" class="form-control" id="id" name="id" pattern="[A-Z]{2}[0-9]{2}" placeholder="Masukkan ID Penerbit" 
                                value="{{ old('id', $penerbit->id ?? '') }}" 
                                {{ isset($penerbit) ? 'readonly' : '' }} 
                                title="ID Penerbit harus terdiri dari 2 huruf besar di awal dan 2 angka di akhir">
                            <small class="text-muted">Format: 2 huruf kapital diikuti 2 angka</small>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama Penerbit</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Penerbit" value="{{ old('nama', $penerbit->nama ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Masukkan Alamat Penerbit">{{ old('alamat', $penerbit->alamat ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="kota" class="form-label fw-semibold">Kota Penerbit</label>
                            <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota Penerbit" value="{{ old('kota', $penerbit->kota ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-semibold">Telepon</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon Penerbit" value="{{ old('telepon', $penerbit->telepon ?? '') }}">
                        </div>

                        <div class="d-flex mt-4 gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fas fa-save me-1"></i> {{ isset($penerbit) ? 'Update' : 'Simpan' }}
                            </button>
                            <a href="{{ route('indexPenerbit')}}" class="btn btn-outline-secondary">
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