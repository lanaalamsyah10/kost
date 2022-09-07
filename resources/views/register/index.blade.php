@extends ('layouts.main')
@section('container')
    <h3 class="text-center">Register</h3>
    <div class="card mt-5">
        <div class="card-body">

            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">

                    <main class="form-registration">
                        <form action="/register" method="post">
                            @csrf
                            <!-- Name input -->
                            <div class="form-floating">
                                <input type="text" name="name"
                                    class="form-control rounded-top @error('name')is-invalid @enderror" id="name"
                                    placeholder="Name" autofocus required value="{{ old('name') }}">
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Username input -->
                            <div class="form-floating">
                                <input type="text" name="username"
                                    class="form-control @error('username')is-invalid @enderror" id="username"
                                    placeholder="Username" required value="{{ old('username') }}">
                                <label for="username">User Name</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <!-- Email input -->
                            <div class="form-floating">
                                <input type="email" name="email"
                                    class="form-control @error('email')is-invalid @enderror" id="email"
                                    placeholder="name@example.com" required value="{{ old('email') }}">
                                <label for="email">Email Address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-floating">
                                <input type="password" name="password"
                                    class="form-control rounded-bottom @error('password')is-invalid @enderror"
                                    id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Daftar</button>
                        </form>
                        <small class="d-block text-center mt-3">Sudah Mendaftar? <a href="/login">Login!</a></small>
                        {{-- <img src="/img/lg.png" class="img-fluid" alt="" > --}}
                    </main>

                </div>

            </div>

        </div>
    </div>
@endsection
