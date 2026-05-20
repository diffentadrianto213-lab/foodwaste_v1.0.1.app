@extends('layouts.app')

@section('title', 'Profil & Pengaturan')

@section('content')
<section class="space-y-5">
    <div class="relative overflow-hidden rounded-[32px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-2xl shadow-purple-200/60 dark:shadow-none transition-colors duration-300">
        <div class="absolute -right-16 -top-16 h-44 w-44 rounded-full bg-purple-300/40 dark:bg-purple-900/20"></div>
        <div class="absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-emerald-200/40 dark:bg-emerald-900/20"></div>

        <div class="relative">
            <p class="mb-4 inline-flex rounded-full bg-purple-100 dark:bg-purple-900/50 px-3 py-2 text-xs font-bold text-purple-800 dark:text-purple-300">
                Profil
            </p>

            <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-slate-950 dark:text-white">
                Profil & Pengaturan
            </h1>

            <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">
                Atur radius pencarian, keyword notifikasi, dan preferensi tampilan aplikasi.
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors duration-300">
            <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                Nama
            </label>

            <input
                type="text"
                value="{{ auth()->user()->name }}"
                disabled
                class="w-full rounded-2xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 px-4 py-4 text-sm font-semibold text-slate-500 dark:text-slate-300 outline-none transition-colors duration-300"
            >
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors duration-300">
            <label class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                Email
            </label>

            <input
                type="email"
                value="{{ auth()->user()->email }}"
                disabled
                class="w-full rounded-2xl border border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-700 px-4 py-4 text-sm font-semibold text-slate-500 dark:text-slate-300 outline-none transition-colors duration-300"
            >
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors duration-300">
            <label for="radius_km" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                Radius Pencarian
            </label>

            <div class="relative">
                <input
                    id="radius_km"
                    name="radius_km"
                    type="number"
                    min="1"
                    max="50"
                    value="{{ old('radius_km', auth()->user()->radius_km) }}"
                    required
                    class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 pr-12 text-sm font-semibold text-slate-900 dark:text-white outline-none transition focus:border-purple-400 focus:bg-white dark:focus:bg-slate-800 focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30"
                >

                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-bold text-slate-400 dark:text-slate-500">
                    km
                </span>
            </div>

            <p class="mt-2 text-xs leading-5 text-slate-500 dark:text-slate-400">
                Gunakan radius 1 sampai 50 km untuk mengatur jangkauan feed makanan.
            </p>
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors duration-300">
            <label for="notification_keyword" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">
                Keyword Notifikasi
            </label>

            <input
                id="notification_keyword"
                name="notification_keyword"
                type="text"
                value="{{ old('notification_keyword', auth()->user()->notification_keyword) }}"
                placeholder="Contoh: Roti"
                class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:border-purple-400 focus:bg-white dark:focus:bg-slate-800 focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30"
            >

            <p class="mt-2 text-xs leading-5 text-slate-500 dark:text-slate-400">
                Kamu akan mendapat alert jika ada postingan baru yang mengandung kata ini.
            </p>
        </div>

        <button
            type="submit"
            class="w-full rounded-full bg-purple-600 dark:bg-purple-500 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-purple-300/60 dark:shadow-none transition hover:bg-purple-700 dark:hover:bg-purple-600"
        >
            Simpan Pengaturan
        </button>
    </form>

    <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors duration-300">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-wide text-slate-400 dark:text-slate-500">
                    Tema UI
                </p>

                <h2 class="mt-2 text-xl font-extrabold text-slate-950 dark:text-white">
                    Mode Tampilan
                </h2>

                <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">
                    Pilih cara tampilan aplikasi ketika digunakan.
                </p>
            </div>

            <span
                id="theme-label"
                class="rounded-full bg-purple-100 dark:bg-purple-900/50 px-3 py-1.5 text-xs font-bold text-purple-800 dark:text-purple-300"
            >
                {{ auth()->user()->theme_mode ?? 'light' }}
            </span>
        </div>

        <button
            id="toggle-theme"
            type="button"
            class="mt-5 w-full rounded-full border border-purple-300 dark:border-purple-600 bg-white dark:bg-slate-800 px-6 py-4 text-sm font-bold text-purple-800 dark:text-purple-300 transition hover:bg-purple-50 dark:hover:bg-slate-700"
        >
            Ganti Mode
        </button>
    </div>

    <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-white dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors duration-300">
        <p class="text-xs font-bold uppercase tracking-wide text-slate-400 dark:text-slate-500">
            Ringkasan Profil
        </p>

        <h2 class="mt-2 text-xl font-extrabold text-slate-950 dark:text-white">
            Preferensi Kamu
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-3">
            <div class="rounded-2xl bg-purple-50/70 dark:bg-slate-700/50 p-4 transition-colors duration-300">
                <p class="text-xs font-bold uppercase tracking-wide text-purple-700 dark:text-purple-400">
                    Radius saat ini
                </p>

                <p class="mt-1 text-lg font-extrabold text-slate-950 dark:text-white">
                    {{ auth()->user()->radius_km }} km
                </p>
            </div>

            <div class="rounded-2xl bg-purple-50/70 dark:bg-slate-700/50 p-4 transition-colors duration-300">
                <p class="text-xs font-bold uppercase tracking-wide text-purple-700 dark:text-purple-400">
                    Keyword alert
                </p>

                <p class="mt-1 text-lg font-extrabold text-slate-950 dark:text-white">
                    {{ auth()->user()->notification_keyword ?: 'Tidak ada' }}
                </p>
            </div>

            <div class="rounded-2xl bg-purple-50/70 dark:bg-slate-700/50 p-4 transition-colors duration-300">
                <p class="text-xs font-bold uppercase tracking-wide text-purple-700 dark:text-purple-400">
                    Mode tema
                </p>

                <p id="theme-summary" class="mt-1 text-lg font-extrabold text-slate-950 dark:text-white">
                    {{ auth()->user()->theme_mode ?? 'light' }}
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    const toggleThemeButton = document.getElementById('toggle-theme');
    const themeLabel = document.getElementById('theme-label');
    const themeSummary = document.getElementById('theme-summary');

    toggleThemeButton?.addEventListener('click', () => {
        const html = document.documentElement;
        // Cek apakah layar saat ini gelap
        const isCurrentlyDark = html.classList.contains('dark');

        if (isCurrentlyDark) {
            // Jika gelap, paksa jadi terang
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            if (themeLabel) themeLabel.textContent = 'light';
            if (themeSummary) themeSummary.textContent = 'light';
            simpanKeDatabase('light');
        } else {
            // Jika terang, paksa jadi gelap
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            if (themeLabel) themeLabel.textContent = 'dark';
            if (themeSummary) themeSummary.textContent = 'dark';
            simpanKeDatabase('dark');
        }
    });

    function simpanKeDatabase(temaBaru) {
        fetch(@json(route('profile.theme')), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ theme: temaBaru }),
        }).catch(() => console.log('Gagal simpan ke DB'));
    }
</script>
@endsection