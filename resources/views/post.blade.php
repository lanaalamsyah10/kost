@extends('layouts.main')
@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-md-11">
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
                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                {{-- <div class="card mt-5">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <h3 class="mb-3">Fasilitas Terdekat</h3>
                                <tr>
                                    <i class="bi bi-shop">
                                        <a class="ml-4">Warung Mimi</a>
                                    </i>
                                </tr>
                                <article class="my-3 fs-5">
                                    {!! $post->body !!}
                                </article>
                            </table>
                        </div>
                    </div>
                </div> --}}


                {{-- @if (!auth()->check())
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan</a>
                @else
                    <a href="/login">Pesan</a>
                @endif --}}

                {{-- lokasi --}}
                {{-- <div id="lokasi">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h1>lokasi</h1>
                            </div>
                            <div class="col-md-12 my-4">
                                <iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0" id="gmap_canvas"
                                    src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20Yogyakarta+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                <a href='https://www.acadoo.de/'>Dissertation schreiben lassen</a>
                                <script type='text/javascript'
                                    src='https://embedmaps.com/google-maps-authorization/script.js?id=a91327b40c3bd56152a11fafe75f0f2cf8ab2c62'>
                                </script>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-5 ">
                    <div id="lokasi">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <h3>Lokasi</h3>
                                </div>
                                <div class="col-md-12 my-4">
                                    <iframe class="lokasi" width="520" height="400" frameborder="0" scrolling="no"
                                        marginheight="0" marginwidth="0" id="gmap_canvas"
                                        src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20Yogyakarta+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                                    <a href='https://www.acadoo.de/'>Dissertation schreiben lassen</a>
                                    <script type='text/javascript'
                                        src='https://embedmaps.com/google-maps-authorization/script.js?id=a91327b40c3bd56152a11fafe75f0f2cf8ab2c62'>
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <a href="/login" class="d-block mt-3">sewa</a>
            </div>
        </div>
    </div>
@endsection
