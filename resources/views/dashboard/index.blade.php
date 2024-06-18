<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('img/logo-pt.png') }}">

    <style>
        body {
            background-color: #f0f0f0;
        }

        .date {
            margin-right: 16px;
            margin-top: 10px;
            font-size: 18px;
            color: #333;
        }

        .card {
            margin-bottom: 1rem;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            font-size: 18px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 10px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 1rem;
        }

        .pagination a,
        .pagination .active {
            margin: 0 0.5rem;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border: 1px solid #4caf50;
            color: #4caf50;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #6ac063;
            color: white;
        }

        .pagination .active {
            background-color: #6ac063;
            color: white;
        }

        footer {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container" style="margin-top: 4rem">
            <div class="col">
                <h1 class="text-center" style="margin-bottom: 3rem">DATA TRANSAKSI TERBARU</h1>
                <div class="col" style="margin-left: 32px">
                    @foreach ($kwitansis as $kwitansi)
                        <div class="card" onclick="window.location.href='{{ route('kwitansi.detail', $kwitansi->id) }}';">
                            <div class="card-header">
                                No. {{ $kwitansis->firstItem() + $loop->index }}
                            </div>
                            <div class="card-body">
                                <p><strong>Nama Admin:</strong> {{ optional($kwitansi->user)->name }}</p>
                                <p><strong>Tanggal:</strong> {{ date('j F Y', strtotime($kwitansi->created_at)) }}</p>
                                <p><strong>No. Kwitansi:</strong> {{ $kwitansi->nomor_kwitansi }}</p>
                                <p><strong>Pembayaran:</strong> {{ $kwitansi->pembayaran }}</p>
                                <p><strong>Keterangan:</strong> {{ $kwitansi->keterangan }}</p>
                            </div>
                        </div>
                    @endforeach
                    {{ $kwitansis->links() }}
                </div>
            </div>
        </div>
    </div>

    @extends('templates.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
