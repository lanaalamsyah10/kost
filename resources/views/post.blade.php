@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>Pemilik <a href="/posts? author={{ $post->author->username }}"
                        class="text-decoration-none text-reset">{{ $post->author->name }}</a>
                    ,Area
                    <a href="/posts? category={{ $post->category->slug }}"class="text-decoration-none text-reset">{{ $post->category->name }}
                </p></a>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid ">
                    </div>
                @else
                    <img src="/img/house.jpg? {{ $post->category->name }}" alt="{{ $post->category->name }}"
                        class="img-fluid ">
                @endif
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                {{-- <h3 class="mb-3">Fasilitas Terdekat</h3>
                                <tr>
                                    <i class="bi bi-shop">
                                        <a class="ml-4">Warung Mimi</a>
                                    </i>
                                </tr> --}}
                                <article class="my-3 fs-5">
                                    {!! $post->body !!}
                                </article>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- @if (!auth()->check())
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan</a>
                @else
                    <a href="/login">Pesan</a>
                @endif --}}


                <a href="/login" class="d-block mt-3">sewa</a>
            </div>
        </div>
    </div>
@endsection
