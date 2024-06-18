<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Kelola Akun</title>
    <link rel="icon" href="{{ asset('img/logo-pt.png') }}">
</head>

<body>
    @include('templates.navbar')
    <div class="date">
        <label class="date float-end" style="font-weight: 500">
            {{ date('l, j F Y') }}
        </label>
    </div>

    <section class="manage-users" style="padding: 1.5rem 24px 1.5rem 24px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 d-flex justify-content-center align-items-center"
                role="alert" style="width: 25%;">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 d-flex justify-content-center align-items-center"
                role="alert" style="width: 25%;">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="text-center" style="margin: 2.5rem 0 0 0"> <a href="{{ route('manage.users') }}"
                class="text-decoration-none" style="color: black">LIST AKUN</a>
        </h1>
        <div class="input mb-2" style="padding-top: 1rem">
            <div class="row">
                <div class="col">
                    <a href="{{ route('manage-users.create') }}" class="btn btn-add mb-1" style="margin-right: 24px">
                        <img class="add" src="{{ asset('icon/user-plus.svg') }}" alt="Add Icon">Tambah Admin</a>
                </div>
            </div>
        </div>
        <div class="content" style="margin: 1.5rem 0 2rem 0">
            <table class="table table-hover table-striped text-center" id="kwitansi-table" style="margin-bottom: 2rem">
                <thead>
                    <tr class="bg-info">
                        <th style="width: 3rem;">No.</th>
                        <th style="width: 5rem;">Nama Admin</th>
                        <th style="width: 5rem;">Username</th>
                        <th style="width: 6rem;">Email</th>
                        <th style="width: 6rem;">Peran</th>
                        <th style="width: 6rem;">Hak Akses</th>
                        <th style="width: 10rem;">Action Akun</th>
                        <th style="width: 10rem;">Action Peran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->getRoleNames() as $role)
                                    {{ $role }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user->getAllPermissions() as $permission)
                                    {{ $permission->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-edit-pencil" title="Ubah Data Admin" href="{{ route('manage-users.edit', $user->id) }}">
                                    <img src="{{ asset('icon/edit.svg') }}" alt="Edit Icon">
                                </a>
                                <button class="btn btn-delete" title="Hapus Akun" data-bs-toggle="modal" data-bs-target="#deleteUserModal-{{ $user->id }}">
                                    <img src="{{ asset('icon/delete.svg') }}" alt="Delete Icon">
                                </button>
                            </td>
                            <td>
                                <!-- Button to trigger modal for adding role -->
                                <a class="btn btn-edit-pencil" title="Ubah Role Admin" 
                                   data-bs-toggle="modal" data-bs-target="#addRoleModal-{{ $user->id }}" 
                                   data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
                                    <img src="{{ asset('icon/edit.svg') }}" alt="Edit Icon">
                                </a>
                                <!-- Button to trigger modal for deleting role -->
                                <a class="btn btn-delete" title="Hapus Role Admin" 
                                   data-bs-toggle="modal" data-bs-target="#deleteRoleModal-{{ $user->id }}" 
                                   data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">
                                    <img src="{{ asset('icon/delete.svg') }}" alt="Delete Icon">
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Konfirmasi Penghapusan -->
                        <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteUserModalLabel">Konfirmasi Penghapusan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus akun <strong>{{ $user->name }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('manage-users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
    @extends('dashboard.manage-users.pop-up.addrole')
    @extends('dashboard.manage-users.pop-up.deleterole')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var addRoleModals = document.querySelectorAll('[id^=addRoleModal-]');
            var deleteRoleModals = document.querySelectorAll('[id^=deleteRoleModal-]');
            
            addRoleModals.forEach(function (modal) {
                modal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var userId = button.getAttribute('data-user-id');
                    var userName = button.getAttribute('data-user-name');
                    var modalTitle = modal.querySelector('.modal-title');
                    var modalBodyInput = modal.querySelector('.modal-body h4');
    
                    modalTitle.textContent = 'Tambah Role Akses untuk ' + userName;
                    modalBodyInput.textContent = userName;
    
                    var form = modal.querySelector('form');
                    form.action = '/manage-users/' + userId + '/assign-role';
                });
            });
    
            deleteRoleModals.forEach(function (modal) {
                modal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var userId = button.getAttribute('data-user-id');
                    var userName = button.getAttribute('data-user-name');
                    var modalTitle = modal.querySelector('.modal-title');
                    var modalBodyInput = modal.querySelector('.modal-body h4');
    
                    modalTitle.textContent = 'Hapus Role Akses untuk ' + userName;
                    modalBodyInput.textContent = userName;
    
                    var form = modal.querySelector('form');
                    form.action = '/manage-users/' + userId + '/remove-role';
                });
            });
        });
    </script>
    
    @extends('templates.footer')
</body>
<style>
    .date {
        margin-right: 16px;
        margin-top: 10px;
        font-size: 18px;
        color: #333;
        /* Warna teks hitam */
    }

    img {
        height: 26px;
        width: 26px;
        margin: 4px;
        padding: 0;
    }

    .table th {
        background-color: #007bff;
        color: white;
        text-align: center;
        vertical-align: middle;
        margin: 0;
        padding: 0 4px 0 4px;
        height: 3rem;
        border-bottom: 1px solid #493d3d;
    }

    .table td {
        margin: 0;
        padding: 0 4px 0 4px;
        vertical-align: middle;
        height: 4rem;
    }

    .btn-add {
        background-color: #8e4761;
        color: #ffffff;
        border-radius: 0.3rem;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        background-color: #acdff8;
        color: #8e4761;
        border: 1px solid #8e4761;
    }

    .btn-add:hover img.add {
        content: url('icon/user-plushover.svg');
    }

    .btn-edit-pencil {
        background-color: #d96652;
        color: #e9ecf1;
        margin: 0;
        padding: 6.5px 8px 6.5px 8px;
        border-radius: 100%;
    }

    .btn-edit-pencil:hover {
        background-color: #8e4761;
        color: #e9ecf1;
        border: 1px solid #f39c7d;
    }

    .btn-delete {
        background-color: #85b1d3;
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
