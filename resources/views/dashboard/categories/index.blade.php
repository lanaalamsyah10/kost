@extends('dashboard.layouts.main')
@section('container')
    <div class="contianer mt-5 ">
        <div class="d-flex justify-content-between border-bottom">
            <h3 class="mt-3">Tabel Kategori</h3>
            <a href="/dashboard/categories/create" class="btn btn-success mb-4 "> Tambah <span data-feather="plus"></span></a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success col-lg-7" role="alert">
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
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span
                                                data-feather="eye"></span></a>

                                        <form action="/dashboard/categories/{{ $category->slug }}" method="post"
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
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    @endsection
