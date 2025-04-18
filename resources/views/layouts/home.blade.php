<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIBOOKSTORE - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body>
<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <!-- Logo with brand -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <i class="bi bi-book-half me-2 fs-3"></i>
            UNIBOOKSTORE
        </a>
        
        <!-- Responsive toggle button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ Request::is('admin*') ? 'active' : '' }}" href="{{ route('admin') }}">
                        Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ Request::is('pengadaan*') ? 'active' : '' }}" href="{{ route('pengadaan') }}">
                        Pengadaan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-4 mt-5 bg-light border-top">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4">
        <h5 class="text-primary mb-1">UNIBOOKSTORE</h5>
        <p class="text-muted small mb-0">Menyediakan koleksi pengetahuan terbaik sejak 2020</p>
      </div>
      <div class="col-md-4 text-center">
        <p class="mb-0">© 2025 UNIBOOKSTORE</p>
        <p class="text-muted small mb-0">Dibuat oleh <strong>Annisa Nur Chasidiyah</strong></p>
      </div>
      <div class="col-md-4 text-md-end">
        <div class="mb-2">
          <a href="#" class="text-decoration-none me-3"><i class="fa-brands fa-instagram fa-2xl" style="color: #9e002f;"></i></a>
          <a href="#" class="text-decoration-none me-3"><i class="fa-brands fa-facebook fa-2xl" style="color: #002057;"></i></a>
          <a href="#" class="text-decoration-none"><i class="fa-brands fa-x-twitter fa-2xl" style="color: black"></i></a>
        </div>
        <p class="text-muted small mb-0">Melayani dengan sepenuh hati</p>
      </div>
    </div>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tabel').DataTable({
                  ordering: false,
              });
      });

        function confirmDelete(event) {
            event.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Ingin menghapusnya?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonText: "Ya, Hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit(); // Submit the form if confirmed
                }
            });
        }
    </script>
<!-- SweetAlert Notification -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false,
    });
</script>
@elseif (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('error') }}',
        timer: 2000,
        showConfirmButton: false,
    });
</script>
@endif
</body>
</html>
