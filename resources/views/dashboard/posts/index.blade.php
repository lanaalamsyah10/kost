@extends('dashboard.layouts.main')
@section('container')
    <div class="contianer mt-5">
        <div class="d-flex justify-content-between border-bottom">
            <h3 class="mt-3">Tabel Postingan</h3>
            <a href="/dashboard/posts/create" class="btn btn-success mb-4"> Tambah <span data-feather="plus"></span></a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kost</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span
                                                data-feather="eye"></span></a>
                                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span
                                                data-feather="edit"></span></a>

                                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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
