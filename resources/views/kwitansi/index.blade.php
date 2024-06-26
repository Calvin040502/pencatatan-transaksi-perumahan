<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>List Transaksi</title>
    <link rel="icon" href="{{ asset('img/logo-pt.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="date-wrapper">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>
    <section class="kwitansi" style="padding: 1.5rem 24px 1.5rem 24px">
        <h1 class="text-center"> <a href="{{ route('kwitansi') }}" class="text-decoration-none"
                style="color: black">LIST DATA TRANSAKSI</a>
        </h1>
        <div class="input" style="padding-top: 2rem">
            <div class="row">
                <div class="col-md-4">
                    <form action="/kwitansi" method="GET" class="me-2">
                        <div class="input-group">
                            <input type="search" class="form-control shadow-sm bg-body-tertiary" placeholder="Search..." name="search" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary shadow-sm" type="submit" style="border-top-left-radius: 0; border-bottom-left-radius: 0" title="Search Data">
                                    <img src="{{ asset('icon/search.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center" style="padding-right: 0rem;">
                    <div>
                        <a href="{{ route('kwitansi.create') }}" class="btn btn-add shadow-sm" title="Tambah Kwitansi">
                            <img class="add" src="{{ asset('icon/notes-add-icon.svg') }}" alt="">
                        </a>
                        <a href="#" class="btn btn-filter shadow-sm" id="filterButton" title="Filter Data">
                            <img class="filter" src="{{ asset('icon/filter-data.svg') }}" alt="">
                        </a>
                        <button type="button" class="btn btn-print dropdown-toggle shadow-sm" data-bs-toggle="dropdown"
                            aria-expanded="false" title="Export Data Excel">
                            <img src="{{ asset('icon/export_notes.svg') }}" alt="">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('kwitansi/export/excel') }}">Export Semua Data</a>
                            </li>
                            <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#durationModal">Export
                                    Range Tanggal</button></li>
                        </ul>
                    </div>
                </div>                
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="content" style="margin: 2rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="kwitansi-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 2rem; justify-content: center; align-items: center; cursor: pointer; border-top-left-radius: 6px"
                            id="sortNo">No.</th>
                        <th style="width: 4rem; cursor: pointer;" id="sortKwitansi">No. Kwitansi</th>
                        <th style="width: 6rem; cursor: pointer;" id="sortTanggal">Tanggal</th>
                        <th style="width: 6rem;">Nama Lengkap</th>
                        <th style="width: 10rem;">Alamat</th>
                        <th style="width: 3rem;">No. HP</th>
                        <th style="width: 6rem;">Terbilang</th>
                        <th style="width: 4rem;">Pembayaran</th>
                        <th style="width: 10rem;">Nama Perumahan</th>
                        <th style="width: 1rem;">No. Kavling</th>
                        <th style="width: 1rem;">Type</th>
                        <th
                            style="width: 5rem; @cannot('super admin')                          
                        @endcannot">
                            Jumlah</th>
                        @can('super admin')
                            <th style="width: 10rem; border-top-right-radius: 6px"> Action</th>
                        @endcan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kwitansis as $kwitansi)
                        <tr onclick="window.location.href='{{ route('kwitansi.detail', $kwitansi->id) }}';"
                            style="cursor: pointer;">
                            <td>{{ $kwitansis->firstItem() + $loop->index }}</td>
                            <td>{{ $kwitansi->nomor_kwitansi }}</td>
                            <td>{{ $kwitansi->created_at->format('d F Y') }}</td>
                            <td>{{ $kwitansi->nama_lengkap }}</td>
                            <td>{{ $kwitansi->alamat }}</td>
                            <td>{{ $kwitansi->no_hp }}</td>
                            <td>{{ $kwitansi->terbilang }}</td>
                            <td> <?php
                            $pembayaran = $kwitansi->pembayaran;
                            $keterangan = $kwitansi->keterangan;
                            
                            if ($pembayaran === 'Booking' || $pembayaran === 'DP' || $pembayaran === 'CBTH' || $pembayaran === 'KET') {
                                echo $pembayaran;
                            } elseif ($pembayaran === 'Angsuran ke') {
                                echo $pembayaran . ' ' . $keterangan;
                            } elseif ($pembayaran === 'Lain-lain') {
                                echo $keterangan;
                            } else {
                                echo $pembayaran;
                            }
                            ?></td>
                            <td>{{ $kwitansi->lokasi }}</td>
                            <td>{{ $kwitansi->no_kavling }}</td>
                            <td>{{ $kwitansi->type }}</td>
                            <td>{{ $kwitansi->jumlah }}</td>
                            @can('super admin')
                                <td
                                    style="padding-left: 1rem; display: flex; height: 7rem; justify-content: space-around; align-items: center">
                                    <a class="btn btn-edit-pencil" title="Edit Data Kwitansi"
                                        href="{{ route('kwitansi.edit', $kwitansi->id) }}">
                                        <img src="{{ asset('icon/pen2.svg') }}" alt=""
                                            style="margin: 4px 0 4px 0">
                                    </a>

                                    <form action="{{ route('kwitansi.destroy', $kwitansi->id) }}}}" method="POST"
                                        class="d-inline-grid">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-delete" title="Hapus Kwitansi"
                                            onclick="return confirm('Hapus Data Kwitansi?')">
                                            <img src="{{ asset('icon/trash3.svg') }}" alt="">
                                        </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kwitansis->links() }}
        </div>
    </section>
    @include('kwitansi.pop-up.date-picker')
    @include('kwitansi.pop-up.filter-date-picker')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
    
    <script>
        function changeRowsPerPage(selectElement) {
            const rowsPerPage = selectElement.value;
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('rowsPerPage', rowsPerPage);
            window.location.href = currentUrl.toString();
        }
    </script>

    <script>
        // JS Filter Data Menggunakan Tanggal
        document.addEventListener('DOMContentLoaded', function() {
            const filterButton = document.getElementById('filterButton');
            const filterDatePickerModal = new bootstrap.Modal(document.getElementById('filterDatePickerModal'));

            filterButton.addEventListener('click', function() {
                filterDatePickerModal.show();
            });

            const filterDatePickerModalButton = document.getElementById('filterDatePickerModalButton');
            filterDatePickerModalButton.addEventListener('click', function() {
                // Ambil nilai tanggal dari input date picker
                const startDateText = document.getElementById('start_date_filter').value;
                const endDateText = document.getElementById('end_date_filter').value;

                // Konversi tanggal dari format "j F Y" ke objek Date
                const startDate = new Date(startDateText);
                const endDate = new Date(endDateText);

                // Sembunyikan modal setelah mengambil nilai tanggal
                filterDatePickerModal.hide();

                // Anda dapat memfilter data di tabel menggunakan startDate dan endDate
                // Sebagai contoh, Anda dapat menyembunyikan baris yang tidak berada dalam rentang tanggal tertentu.

                // Ambil semua baris dalam tabel
                const rows = document.querySelectorAll('#kwitansi-table tbody tr');

                // Iterasi melalui setiap baris dan periksa tanggal
                rows.forEach(row => {
                    const tanggalText = row.cells[2]
                        .textContent; // Menggunakan indeks 2 karena kolom tanggal berada pada indeks 2
                    const tanggal = new Date(tanggalText);

                    // Format tanggal dalam "j F Y"
                    const formatter = new Intl.DateTimeFormat('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    if (
                        formatter.format(tanggal) >= formatter.format(startDate) &&
                        formatter.format(tanggal) <= formatter.format(endDate)
                    ) {
                        // Tampilkan baris jika tanggal berada dalam rentang
                        row.style.display = '';
                    } else {
                        // Sembunyikan baris jika tanggal tidak berada dalam rentang
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>


    <script>
        //JS Export Data Excell Menggunakan Rentang Tanggal
        document.addEventListener('DOMContentLoaded', function() {
            // Temukan elemen tombol ekspor di dalam modal
            const exportDurationModalButton = document.getElementById('exportDurationModalButton');

            // Tambahkan penanganan acara klik
            exportDurationModalButton.addEventListener('click', function() {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;

                // Mengonversi tanggal ke format ISO (YYYY-MM-DD)
                const isoStartDate = new Date(startDate).toISOString().split('T')[0];
                const isoEndDate = new Date(endDate).toISOString().split('T')[0];

                // Redirect ke URL ekspor dengan parameter tanggal
                window.location.href =
                    `{{ url('kwitansi/export/excel-with-date') }}?start_date=${isoStartDate}&end_date=${isoEndDate}`;

                // Sembunyikan modal setelah pengguna mengklik tombol "Export"
                const modal = new bootstrap.Modal(document.getElementById('durationModal'));
                modal.hide();
            });
        });
    </script>
    <script>
        //JS Refresh
        document.addEventListener('DOMContentLoaded', function() {
            const refreshButton = document.getElementById('refreshButton');

            refreshButton.addEventListener('click', function() {
                // Lakukan operasi atau pengiriman data ke server sesuai dengan kebutuhan Anda untuk me-refresh data.
                // Misalnya, Anda bisa membuat permintaan AJAX ke server untuk memuat ulang data.

                // Setelah memuat ulang data, Anda dapat mereload halaman untuk menampilkan perubahan.
                location.reload();
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Store the original order of the rows
        const originalRows = Array.from(document.querySelectorAll('#kwitansi-table tbody tr'));

        // Function to handle sorting for alphanumeric columns
        function sortAlphanumericColumn(columnIndex, isAsc) {
            const tableBody = document.querySelector('#kwitansi-table tbody');
            const rows = originalRows.slice(); // Create a copy of the original rows

            rows.sort(function (rowA, rowB) {
                const cellA = rowA.cells[columnIndex].textContent;
                const cellB = rowB.cells[columnIndex].textContent;

                // Use localeCompare for alphanumeric sorting
                return isAsc ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
            });

            // Remove existing rows
            tableBody.innerHTML = '';

            // Append sorted rows to the table
            rows.forEach(row => tableBody.appendChild(row));
        }

        // Function to handle sorting for numeric columns
        function sortNumericColumn(columnIndex, isAsc) {
            const tableBody = document.querySelector('#kwitansi-table tbody');
            const rows = originalRows.slice(); // Create a copy of the original rows

            rows.sort(function (rowA, rowB) {
                const cellA = parseFloat(rowA.cells[columnIndex].textContent);
                const cellB = parseFloat(rowB.cells[columnIndex].textContent);

                return isAsc ? cellA - cellB : cellB - cellA;
            });

            // Remove existing rows
            tableBody.innerHTML = '';

            // Append sorted rows to the table
            rows.forEach(row => tableBody.appendChild(row));
        }

        // Function to handle sorting for date column
        function sortDateColumn(columnIndex, isAsc) {
            const tableBody = document.querySelector('#kwitansi-table tbody');
            const rows = originalRows.slice(); // Create a copy of the original rows

            rows.sort(function (rowA, rowB) {
                const dateA = new Date(rowA.cells[columnIndex].textContent);
                const dateB = new Date(rowB.cells[columnIndex].textContent);

                return isAsc ? dateA - dateB : dateB - dateA;
            });

            // Remove existing rows
            tableBody.innerHTML = '';

            // Append sorted rows to the table
            rows.forEach(row => tableBody.appendChild(row));
        }

        // Sorting for No. column
        const sortNoButton = document.getElementById('sortNo');
        let isSortNoAsc = true;

        sortNoButton.addEventListener('click', function () {
            sortNumericColumn(0, isSortNoAsc);
            isSortNoAsc = !isSortNoAsc;
        });

        // Sorting for No. Kwitansi column
        const sortKwitansiButton = document.getElementById('sortKwitansi');
        let isSortKwitansiAsc = true;

        sortKwitansiButton.addEventListener('click', function () {
            sortAlphanumericColumn(1, isSortKwitansiAsc);
            isSortKwitansiAsc = !isSortKwitansiAsc;
        });

        // Sorting for Tanggal column
        const sortTanggalButton = document.getElementById('sortTanggal');
        let isSortTanggalAsc = true;

        sortTanggalButton.addEventListener('click', function () {
            sortDateColumn(2, isSortTanggalAsc);
            isSortTanggalAsc = !isSortTanggalAsc;
        });
    });
</script>

    @extends('templates.footer')
</body>

<style>
    /* Menyesuaikan tata letak */
    .date-wrapper {
        margin: 20px 32px 0 0;
    }

    .date {
        font-weight: 500;
        font-size: 14pt;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    .kwitansi {
        flex-grow: 1;
        min-height: calc(100vh - 60px);
    }

    .table th {
        background-color: #007bff;
        color: white;
        text-align: center;
        vertical-align: middle;
        margin: 0;
        padding: 0 4px 0 4px;
        height: 4rem;
        border-bottom: 1px solid #493d3d;
    }

    .table td {
        margin: 0;
        padding: 0 4px 0 4px;
        vertical-align: middle;
        height: 3rem;
        padding-top: 20px; 
        padding-bottom: 20px; 
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

    /* Menyesuaikan ukuran ikon */
    img {
        height: 26px;
        width: 26px;
        margin: 4px;
        padding: 0;
    }

    /* Menyesuaikan ukuran dan gaya tombol tambah */
    .btn-add {
        width: 4rem;
        background-color: #f9d150;
        color: #404567;
        border-radius: 0.3rem;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761;
    }

    .btn-add:hover img.add {
        content: url('icon/notes-add-icon.svg');
    }

    /* Menyesuaikan ukuran dan gaya tombol filter */
    .btn-filter {
        width: 4rem;
        background-color: #f9d150;
        color: #404567;
        border-radius: 0.3rem;
        transition: all 0.3s ease;
    }

    .btn-filter:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761;
    }

    .btn-filter:hover img.filter {
        content: url('icon/filter-data.svg');
    }

    /* Menyesuaikan ukuran dan gaya tombol refresh */
    .btn-refresh {
        width: 4rem;
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-refresh:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-refresh:hover img.refresh {
        content: url('icon/refresh-hover.svg');
    }

    /* Menyesuaikan gaya tombol ekspor */
    .btn-print {
        background-color: #f9d150;
        color: #404567;
        border-radius: 0.3rem;
    }

    .btn-print:hover {
        background-color: #e5eae6;
        color: #404567;
        border: 1px solid #8e4761;
    }

    /* Menyesuaikan gaya tombol edit */
    .btn-edit-pencil {
        background-color: #d96652;
        color: #e9ecf1;
        border-radius: 100%;
    }

    .btn-edit-pencil:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d;
    }

    /* Menyesuaikan gaya tombol hapus */
    .btn-delete {
        background-color: #33434f;
        color: #ffffff;
        margin: 0;
        padding: 6.5px 8px 6.5px 8px;
        border-radius: 100%;
    }

    .btn-delete:hover {
        background-color: #b0b2b7;
        color: #ffffff;
        border: 1px solid #33434f;
    }
</style>


</html>
