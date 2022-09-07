@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/admin/" class="btn btn-success"><span data-feather="arrow-left"></span>Kembali</a>
                <a href="/dashboard/admin/{{ $post->slug }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>Edit</a>


                <form action="/dashboard/admin/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger " onclick="return confirm('Yakin mau dihapus?')">
                        <span data-feather="x-circle"></span>Hapus</button>
                </form>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid mt-3">
                    </div>
                @else
                    <img src="/img/house.jpg? {{ $post->category->name }}" alt="{{ $post->category->name }}"
                        class="img-fluid mt-3">
                @endif


                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
