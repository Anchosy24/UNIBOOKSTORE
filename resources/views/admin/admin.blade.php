@extends('layouts.home')
@section('title', 'Admin')

@section('content')
<div class="container-fluid py-4">
    <!-- Admin Hero Section -->
    <div class="card border-0 shadow-lg rounded-4 mb-5 bg-primary bg-opacity-10">
        <div class="card-body p-5">
            <div class="text-center">
                <div class="bg-primary text-white p-3 d-inline-block rounded-circle mb-3">
                    <i class="fas fa-user-shield fa-3x"></i>
                </div>
                <h2 class="fw-bold text-primary">Panel Admin</h2>
                <p class="lead text-muted">Kelola data UNIBOOKSTORE dengan mudah dan efisien</p>
            </div>
        </div>
    </div>

    <!-- Large Management Buttons -->
    <div class="row g-4 mb-1">
        <!-- Kelola Data Buku Button -->
        <div class="col-md-6">
            <div class="card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <a href="{{ route('indexBuku') }}" class="text-decoration-none">
                        <div class="row g-0">
                            <div class="col-4 bg-primary d-flex align-items-center justify-content-center py-5">
                                <i class="fas fa-book fa-4x text-white"></i>
                            </div>
                            <div class="col-8 p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="fw-bold text-primary mb-0">Kelola Data Buku</h3>
                                </div>
                                <p class="text-muted mb-3">Tambah, edit, dan hapus data buku dalam sistem UNIBOOKSTORE</p>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 me-3">
                                        <i class="fas fa-book-open me-1"></i> Lihat Semua Buku
                                    </div>
                                    <i class="fas fa-arrow-right text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kelola Data Penerbit Button -->
        <div class="col-md-6">
            <div class="card border-0 shadow-lg h-100 rounded-4 overflow-hidden">
                <div class="card-body p-0">
                    <a href="{{ route('indexPenerbit') }}" class="text-decoration-none">
                        <div class="row g-0">
                            <div class="col-4 bg-info d-flex align-items-center justify-content-center py-5">
                                <i class="fas fa-building fa-4x text-white"></i>
                            </div>
                            <div class="col-8 p-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h3 class="fw-bold text-info mb-0">Kelola Data Penerbit</h3>
                                </div>
                                <p class="text-muted mb-3">Tambah, edit, dan hapus data penerbit buku dalam sistem UNIBOOKSTORE</p>
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 text-info rounded-pill px-3 py-2 me-3">
                                        <i class="fas fa-list me-1"></i> Lihat Semua Penerbit
                                    </div>
                                    <i class="fas fa-arrow-right text-info"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection