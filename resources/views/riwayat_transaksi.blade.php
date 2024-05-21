<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('keranjang') }}" class="nav-link"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('riwayat.transaksi') }}" class="nav-link">Riwayat Transaksi</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
<div class="container mt-5">
    <h1 class="mb-4">Riwayat Transaksi</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($riwayatTransaksi->isEmpty())
        <div class="alert alert-info">
            Anda belum memiliki riwayat transaksi.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Tanggal Pembelian</th>
                        <th>Status Transaksi</th>
                        <th>Total Pembayaran</th>
                        <th>Payment Type</th>
                        <th>Detail Kendaraan</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayatTransaksi as $transaksi)
                        <tr>
                            <td>{{ $transaksi->order_id }}</td>
                            <td>{{ $transaksi->purchase_date }}</td>
                            <td>
                                @if ($transaksi->transaction_status == 'settlement')
                                    <span class="badge badge-success">Success</span>
                                @else
                                    <span class="badge badge-warning">{{ $transaksi->transaction_status }}</span>
                                @endif
                            </td>
                            <td>{{ number_format($transaksi->gross_amount, 0, ',', '.') }} IDR</td>
                            <td>{{ $transaksi->payment_type }}</td>
                            <td>
                                @php
                                    $kendaraanIds = explode(',', $transaksi->kendaraan_id);
                                    $kendaraans = \App\Models\Kendaraan::whereIn('id', $kendaraanIds)->get();
                                @endphp
                                @foreach ($kendaraans as $kendaraan)
                                    <p>{{ $kendaraan->nama }} - {{ number_format($kendaraan->harga, 0, ',', '.') }} IDR</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($kendaraans as $kendaraan)
                                    <p>{{ floor($transaksi->gross_amount / $kendaraan->harga) }}</p>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>