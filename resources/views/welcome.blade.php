@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
<section class="flex min-h-[70vh] items-center">
    <div class="relative w-full overflow-hidden rounded-[32px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-7 shadow-2xl shadow-purple-200/60 dark:shadow-none transition-colors duration-300">
        
        <div class="absolute -right-16 -top-16 h-44 w-44 rounded-full bg-purple-300/40 dark:bg-purple-900/20"></div>
        <div class="absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-emerald-200/40 dark:bg-emerald-900/20"></div>

        <div class="relative">
            <p class="mb-5 inline-flex rounded-full bg-purple-100 dark:bg-purple-900/50 px-3 py-2 text-xs font-bold text-purple-800 dark:text-purple-300 transition-colors">
                Pintu Masuk: Onboarding & Autentikasi
            </p>

            <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-slate-950 dark:text-white transition-colors">
                Selamat datang di Food Waste App
            </h1>

            <p class="mt-4 text-sm leading-6 text-slate-600 dark:text-slate-300 transition-colors">
                Aplikasi lokal untuk berbagi makanan sisa secara gratis atau dengan harga diskon.
                Bangun komunitas hyper-local, temukan makanan dekatmu, dan kurangi sampah makanan bersama tetangga.
            </p>

            <div class="mt-7 grid gap-3">
                <a href="{{ route('register') }}" class="flex items-center justify-center rounded-full bg-purple-600 dark:bg-purple-500 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-purple-300/60 dark:shadow-none transition hover:bg-purple-700 dark:hover:bg-purple-600">
                    Sign Up
                </a>

                <a href="{{ route('login') }}" class="flex items-center justify-center rounded-full border border-purple-300 dark:border-purple-600 bg-white dark:bg-slate-800 px-6 py-4 text-sm font-bold text-purple-800 dark:text-purple-300 transition hover:bg-purple-50 dark:hover:bg-slate-700">
                    Log In
                </a>
            </div>
        </div>
    </div>
</section>
@endsection