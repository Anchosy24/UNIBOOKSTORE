@extends('layouts.home')
@section('title', 'Home')

@section('content')
<!-- Hero Section with Enhanced Creative Carousel -->
<div class="container-fluid p-0">
    <div class="card border-0 rounded-0 shadow-lg">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                @foreach($images as $index => $image)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}" 
                            class="{{ $index == 0 ? 'active rounded-circle mx-1' : 'rounded-circle mx-1' }}" 
                            style="width: 12px; height: 12px;"
                            aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            
            <!-- Carousel Items -->
            <div class="carousel-inner rounded-3">
                @foreach($images as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="4000">
                        <div class="position-relative">
                            <img src="{{ $image }}" class="d-block w-100" alt="Book Image {{ $index + 1 }}" style="height: 500px; object-fit: cover;">
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <div class="bg-dark bg-opacity-75 text-white p-4 rounded-3 shadow">
                                    <h2 class="fw-bold">{{ ['Discover Literary Treasures', 'Explore New Worlds', 'Unleash Your Imagination', 'Journey Through Stories'][$index % 4] }}</h2>
                                    <p class="lead mb-0">{{ ['Curated selection for every reader', 'From classics to contemporary gems', 'Find your next favorite book today', 'Quality books at your fingertips'][$index % 4] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-primary bg-opacity-75 rounded-circle p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-primary bg-opacity-75 rounded-circle p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Stats Cards with Animated Hover Effects -->
    <div class="container my-5">
        <div class="row g-4 mb-4">
            <!-- Card 1: Total Books -->
            <div class="col-xl-4 col-md-6">
                <div class="card border-1 shadow-sm h-100 transition-transform hover-scale">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-5">
                                <i class="fas fa-book text-primary" style="font-size: 4rem;"></i>
                            </div>
                            <div class="col-7 text-end">
                                <h4 style="font-weight: 600; font-size:3rem;">{{ $totalStok }}</h4>
                                <p style="font-size:1rem;">Total Buku</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('indexBuku') }}" class="text-dark d-flex justify-content-between" style="text-decoration: none;">
                            <p style="font-weight: 500; font-size:1rem; margin-bottom: 0;">Detail</p>
                            <i class="fa-solid fa-arrow-right-long pt-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Publishers -->
            <div class="col-xl-4 col-md-6">
                <div class="card border-1 shadow-sm h-100 transition-transform hover-scale">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-5">
                                <i class="fas fa-building text-warning" style="font-size: 4rem;"></i>
                            </div>
                            <div class="col-7 text-end">
                                <h4 style="font-weight: 600; font-size:3rem;">{{ $jumlahPenerbit }}</h4>
                                <p style="font-size:1rem;">Penerbit</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('indexPenerbit') }}" class="text-dark d-flex justify-content-between" style="text-decoration: none;">
                            <p style="font-weight: 500; font-size:1rem; margin-bottom: 0;">Detail</p>
                            <i class="fa-solid fa-arrow-right-long pt-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Low Stock -->
            <div class="col-xl-4 col-md-6">
                <div class="card border-1 shadow-sm h-100 transition-transform hover-scale">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-5">
                                <i class="fas fa-exclamation-triangle text-danger" style="font-size: 4rem;"></i>
                            </div>
                            <div class="col-7 text-end">
                                <h4 style="font-weight: 600; font-size:3rem;">{{ $stokTipis }}</h4>
                                <p style="font-size:1rem;">Stok Menipis</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="" class="text-dark d-flex justify-content-between" style="text-decoration: none;">
                            <p style="font-weight: 500; font-size:1rem; margin-bottom: 0;">Detail</p>
                            <i class="fa-solid fa-arrow-right-long pt-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Interactive Search Bar with Decorative Elements -->
    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 p-3 bg-primary bg-opacity-10">
            <div class="card-body">
                <div class="text-center mb-4">
                    <span class="badge bg-primary p-2 mb-2">
                        <i class="fas fa-search"></i>
                    </span>
                    <h4 class="fw-bold text-primary">Temukan Buku Impian Anda</h4>
                    <p class="text-muted">Eksplorasi koleksi lengkap kami dengan mudah</p>
                </div>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-primary text-white border-0">
                        <i class="fas fa-book-open"></i>
                    </span>
                    <input type="search" class="form-control border-primary" placeholder="Judul, penulis, atau kata kunci..." aria-label="Search" />
                    <button class="btn btn-primary px-4 d-flex align-items-center" type="button">
                        <i class="fas fa-search me-2"></i> Cari
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            <!-- Recent Books Added with Enhanced Style -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="bg-primary text-white p-2 rounded-circle me-2">
                                <i class="fas fa-book-open"></i>
                            </span>
                            <h6 class="m-0 fw-bold">Buku Terbaru</h6>
                        </div>
                        <a href="{{ route('indexBuku') }}" class="btn btn-sm btn-primary rounded-pill">
                            <i class="fas fa-list me-1"></i> Lihat Semua
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" class="ps-4">Judul Buku</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col" class="text-end pe-4">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukuTerbaru as $baru)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 text-primary p-2 me-3 rounded-circle">
                                                    <i class="fas fa-book"></i>
                                                </div>
                                                <div>
                                                    <p class="fw-bold mb-0">{{ $baru->nama }}</p>
                                                    <span class="badge bg-light text-dark">{{ $baru->kategori }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="d-flex align-items-center">
                                                <i class="fas fa-building text-muted me-2 small"></i>
                                                {{ $baru->dataPenerbitBuku->nama }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($baru->stok > 15)
                                                <span class="badge bg-success">{{ $baru->stok }}</span>
                                            @elseif($baru->stok > 10)
                                                <span class="badge bg-warning text-dark">{{ $baru->stok }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $baru->stok }}</span>
                                            @endif
                                        </td>
                                        <td class="text-end pe-4">
                                            <span class="fw-bold">Rp. {{ number_format($baru->harga, 0, ',', '.') }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & System Status -->
            <div class="col-lg-5">
                <!-- Quick Actions with Interactive Buttons -->
                <div class="card border-0 shadow-sm mb-4 rounded-4 overflow-hidden">
                    <div class="card-header bg-white py-3 d-flex align-items-center">
                        <span class="bg-primary text-white p-2 rounded-circle me-2">
                            <i class="fas fa-bolt"></i>
                        </span>
                        <h6 class="m-0 fw-bold">Aksi Cepat</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <a href="{{ route('formBuku') }}" class="card border-0 bg-primary bg-opacity-10 text-primary h-100 text-decoration-none">
                                    <div class="card-body text-center py-4">
                                        <div class="mb-3">
                                            <i class="fas fa-plus-circle fa-3x"></i>
                                        </div>
                                        <h6 class="mb-0">Tambah Buku</h6>
                                        <small class="text-muted">Tambahkan buku baru</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('formPenerbit') }}" class="card border-0 bg-info bg-opacity-10 text-info h-100 text-decoration-none">
                                    <div class="card-body text-center py-4">
                                        <div class="mb-3">
                                            <i class="fas fa-building fa-3x"></i>
                                        </div>
                                        <h6 class="mb-0">Tambah Penerbit</h6>
                                        <small class="text-muted">Daftarkan penerbit baru</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="card border-0 bg-success bg-opacity-10 text-success h-100 text-decoration-none">
                                    <div class="card-body text-center py-4">
                                        <div class="mb-3">
                                            <i class="fas fa-file-export fa-3x"></i>
                                        </div>
                                        <h6 class="mb-0">Export Data</h6>
                                        <small class="text-muted">Download laporan</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection