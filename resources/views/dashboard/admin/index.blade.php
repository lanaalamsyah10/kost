@extends('dashboard.layouts.main')
@section('container')
    <div class="contianer mt-5">
        <div class="d-flex justify-content-between border-bottom">
            <h3 class="mt-3">Tabel Pengguna</h3>
            <a href="/dashboard/admin/create" class="btn btn-success mb-4 "> Tambah <span data-feather="plus"></span></a>
        </div>

        @if ($message = session()->get('success'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil ditambahkan'
                })
            </script>
        @elseif($message = session()->get('sucUpdate'))
            <div class="alert alert-success col-12" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
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
                                        @if ($user->is_admin == 1)
                                            <span class="badge bg-primary">Super Admin</span>
                                        @elseif($user->is_admin == 2)
                                            <span class="badge bg-success">Admin</span>
                                        @elseif($user->is_admin == 0)
                                            <span class="badge bg-secondary">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.show', $user->id) }}" class="badge bg-info"><span
                                                data-feather="eye"></span></a>
                                        <a href="{{ route('admin.edit', $user->id) }}" class="badge bg-warning"><span
                                                data-feather="edit"></span></a>

                                        <form action="{{ route('admin.destroy', $user->id) }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Yakin mau dihapus?')">
                                                <span data-feather="x-circle"></span></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
