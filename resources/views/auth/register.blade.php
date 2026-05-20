@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<section class="flex min-h-[70vh] items-center">
    <div class="relative w-full overflow-hidden rounded-[32px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-7 shadow-2xl shadow-purple-200/60 dark:shadow-none transition-colors duration-300">
        <div class="absolute -right-16 -top-16 h-44 w-44 rounded-full bg-purple-300/40 dark:bg-purple-900/20"></div>
        <div class="absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-emerald-200/40 dark:bg-emerald-900/20"></div>

        <div class="relative">
            <p class="mb-4 inline-flex rounded-full bg-purple-100 dark:bg-purple-900/50 px-3 py-2 text-xs font-bold text-purple-800 dark:text-purple-300 transition-colors">
                Buat Akun Baru
            </p>

            <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-slate-950 dark:text-white transition-colors">
                Mulai berbagi makanan
            </h1>

            <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300 transition-colors">
                Buat akun untuk membagikan makanan sisa, menemukan makanan di sekitar kamu,
                dan membantu mengurangi sampah makanan.
            </p>

            <form method="POST" action="{{ route('register.submit') }}" class="mt-7 space-y-5">
                @csrf

                <div>
                    <label for="name" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                        Nama
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        placeholder="Nama kamu"
                        class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition-all focus:border-purple-400 focus:bg-black dark:focus:bg-slate-900 focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30 placeholder:text-slate-400 dark:placeholder:text-slate-500"
                    >
                </div>

                <div>
                    <label for="email" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                        Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="contoh@email.com"
                        class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition-all focus:border-purple-400 focus:bg-black dark:focus:bg-slate-900 focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30 placeholder:text-slate-400 dark:placeholder:text-slate-500"
                    >
                </div>

                <div>
                    <label for="password" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Buat password"
                        class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition-all focus:border-purple-400 focus:bg-black dark:focus:bg-slate-900 focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30 placeholder:text-slate-400 dark:placeholder:text-slate-500"
                    >
                </div>

                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                        Konfirmasi Password
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        placeholder="Ulangi password"
                        class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition-all focus:border-purple-400 focus:bg-black dark:focus:bg-slate-900 focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30 placeholder:text-slate-400 dark:placeholder:text-slate-500"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full rounded-full bg-purple-600 dark:bg-purple-500 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-purple-300/60 dark:shadow-none transition hover:bg-purple-700 dark:hover:bg-purple-600"
                >
                    Daftar
                </button>

                <a
                    href="{{ route('login') }}"
                    class="flex w-full items-center justify-center rounded-full border border-purple-300 dark:border-purple-600 bg-black dark:bg-slate-800 px-6 py-4 text-sm font-bold text-purple-800 dark:text-purple-300 transition hover:bg-purple-50 dark:hover:bg-slate-700"
                >
                    Sudah punya akun? Log In
                </a>
            </form>
        </div>
    </div>
</section>
@endsection