@extends('layouts.main')

@section('container')
    <h3 class="mb-5"> Area Kost Jogja</h3>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card bg-white p-0 text-white mb-4 border-0">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('img/house.jpg') }}"
                                class="card-img" alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center  p-0">
                                <h5 class="card-title text-center flex-fill p-3 fs-3"
                                    style="background-color:rgba(0,0,0,0.5)">
                                    {{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
