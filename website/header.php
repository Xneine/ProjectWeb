<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Header</title>
</head>
<body>
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <div class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-5 d-none d-sm-inline">HEADER</span>
            </div>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <!-- ini bagian HOME -->
                <li class="nav-item">
                    <a href="#" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>
                <!-- ini bagian produk -->
                <li class="nav-item">
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle" role="button" aria-expanded="false" aria-controls="submenu1">
                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Produk</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </a>
                    <div class="collapse" id="submenu1">
                        <ul class="nav flex-column ms-1">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Kategori</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Satuan</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Detail Produk</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- ini bagian stok -->
                <li class="nav-item">
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-speedometer2"></i> 
                        <span class="ms-1 d-none d-sm-inline">Stok</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </a>
                    <div class="collapse" id="submenu2">
                        <ul class="nav flex-column ms-1">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Stok Masuk</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Stok Keluar</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ini bagian TRANSAKSI -->
                <li class="nav-item">
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Transaksi</span> </a>
                </li>
                <!-- ini bagian LAPORAN -->
                <li class="nav-item">
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Laporan</span>
                        <i class="bi bi-caret-down-fill"></i>
                    </a>
                        <div class="collapse" id="submenu3">
                            <ul class="nav flex-column ms-1">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Stok Masuk</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Stok Keluar</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Penjualan</span>
                                    </a>
                            </ul>
                        </div>
                </li>
                <!-- ini bagian PENGATURAN -->
                <li class="nav-item">
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Pengaturan</span> </a>
                </li>
                <!-- ini bagian pengguna -->
                <li class="nav-item">
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Pengguna</span> </a>
                </li>
                <!-- LOGOUT -->
                <li class="nav-item position-absolute bottom-0">
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="bi bi-power"></i><span class="ms-1 d-none d-sm-inline">logout</span> </a>
                </li>
            </ul>
            <hr>
        </div>
    </div>
</body>

