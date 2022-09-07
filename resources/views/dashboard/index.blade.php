@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat datang {{ auth()->user()->name }}</h1>
    </div>
    <img src="img/lg.png" alt="" style="width:200px;">
    <h4 class="fw-normal mt-4">KosJogja</h4>
    <p class="">Aplikasi Anak Kos Yogyakarta.
        🏡 Cari & pesan kamar kost impianmu di KostJogja pakai Booking Langsung
        📱 Cari akomodasi berkualitas, harga terjangkau dengan Singgahsini yang dapat disewa secara harian maupun bulanan
    </p>
    <p class="lg-6">KostJogja merupakan salah satu aplikasi pencari kos di Yogyakarta. Didirikan pada 23 Juli 2022,
        KostJogja terus berkembang dan berusaha menjadi penghubung bagi pemilik kos dan pencari kos.
        KostJogja memanfaatkan teknologi dengan mengelola dan menyajikan daftar kos dengan penjelasan fasilitas secara
        terperinci dan dilengkapi dengan foto serta detail dari setiap kos.
        Saat ini KostJogja memiliki lebih dari 20 ribu kamar kos yang tersebar di wilayah Yogyakarta.
        KostJogja berusaha untuk bisa terus menyajikan data ketersediaan kamar yang akurat, agar calon pencari kos
        mendapatkan
        kemudahan dalam pencarian kos.</p>
@endsection
