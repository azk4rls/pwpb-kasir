@extends('layouts.app')

@section('content')

<style>
    /* Gradient Background yang Lebih Modern */
    body {
        /* Memastikan body memenuhi seluruh viewport height */
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); /* Gradien Merah Elegan */
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* HIDE NAVBAR - Sembunyikan semua elemen navbar */
    nav, .navbar, header {
        display: none !important;
    }
    
    /* FIX: Styling untuk Kolom Container - DIPERLEBAR */
    .register-col {
        /* Mengatur lebar maksimum yang lebih besar */
        max-width: 900px; /* Diperlebar untuk form register */
        /* Memastikan elemen mengambil seluruh lebar yang tersedia di dalam max-width */
        width: 100%;
        padding: 0 15px; /* Padding samping untuk tampilan mobile */
    }
    
    /* Padding lebih besar untuk card-body */
    .card-body {
        padding: 2rem 4rem !important; /* Padding horizontal 4rem */
    }

    /* Card dengan Efek Kaca (Glass-like) */
    .register-card {
        background: rgba(255, 255, 255, 0.95); /* Sedikit Transparansi */
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3); /* Shadow yang Lebih Dalam */
        border: 1px solid rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(5px); /* Efek blur ringan */
        /* FIX: Menetapkan lebar maksimum yang ketat pada card */
        max-width: 100%; 
    }
    .register-header {
        background: #fdfdfd;
        text-align: center;
        padding: 30px 20px 20px;
        border-bottom: 1px solid #eee;
    }
    .register-header img {
        width: 70px;
        margin-bottom: 5px;
        filter: drop-shadow(0 0 5px rgba(231, 76, 60, 0.5));
    }
    /* Tombol Merah Elegan */
    .btn-register {
        background-color: #e74c3c !important;
        border: none;
        color: #fff !important;
        font-weight: 700;
        padding: 12px 25px;
        border-radius: 10px;
        transition: all 0.3s ease;
        width: 100%;
    }
    .btn-register:hover {
        background-color: #c0392b !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.5);
    }
    /* Input Form */
    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
        border-color: #ddd;
    }
    .form-control:focus {
        border-color: #e74c3c;
        box-shadow: 0 0 0 0.25rem rgba(231, 76, 60, 0.25);
    }
    /* Link Login */
    .login-link {
        color: #e74c3c !important;
        font-weight: 500;
        transition: color 0.3s;
        text-decoration: none;
    }
    .login-link:hover {
        color: #c0392b !important;
        text-decoration: underline;
    }
</style>

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    {{-- Container untuk form register --}}
    <div class="register-col"> 

        <div class="card register-card">

            {{-- Header with Logo --}}
            <div class="register-header">
                <h4 class="fw-bold mt-2 mb-0" style="color: #333;">Daftar Akun</h4>
                <p class="text-muted small">Buat akun baru untuk kasir</p>
            </div>

            {{-- Form --}}
            <div class="card-body">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap Anda">
                        @error('name')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required placeholder="Masukkan email Anda">
                        @error('email')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" required placeholder="Masukkan password Anda">
                        @error('password')
                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label class="form-label fw-bold">Konfirmasi Password</label>
                        <input id="password-confirm" type="password"
                            class="form-control"
                            name="password_confirmation" required placeholder="Masukkan ulang password Anda">
                    </div>

                    {{-- Button --}}
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-register">
                            DAFTAR
                        </button>
                    </div>

                    {{-- Link to Login --}}
                    <div class="text-center">
                        <span class="small">Sudah punya akun? </span>
                        <a class="login-link small" href="{{ route('login') }}">
                            Masuk di sini
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection