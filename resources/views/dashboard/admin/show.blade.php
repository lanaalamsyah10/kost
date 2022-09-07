@extends('dashboard.layouts.main')
@section('container')
    <div class="contianer mt-5">
        <div class="d-flex justify-content-between border-bottom">
            <h3 class="mt-3">Tabel Postingan Pengguna</h3>
        </div>
    </div>
    {{ $admin->name }}


    <div class="card mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Body</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit(strip_tags($item->body), 70) }}</td>
                                <td><a href="{{ route('admin.show', $item->id) }}" class="badge bg-info"><span
                                            data-feather="eye"></span></a></td>
                            </tr>
                            {{-- <h5>{{ $item->title }}</h5>
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="">
                                    <p>{!! $item->body !!}</p> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
