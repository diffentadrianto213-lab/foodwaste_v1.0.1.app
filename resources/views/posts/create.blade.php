@extends('layouts.app')

@section('title', 'Bagikan Makanan')

@section('content')
<section class="space-y-5">
    <div class="relative overflow-hidden rounded-[32px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-6 shadow-2xl shadow-purple-200/60 dark:shadow-none transition-colors duration-300">
        <div class="absolute -right-16 -top-16 h-44 w-44 rounded-full bg-purple-300/40 dark:bg-purple-900/20"></div>
        <div class="absolute -bottom-20 -left-20 h-48 w-48 rounded-full bg-emerald-200/40 dark:bg-emerald-900/20"></div>

        <div class="relative">
            <p class="mb-4 inline-flex rounded-full bg-purple-100 dark:bg-purple-900/50 px-3 py-2 text-xs font-bold text-purple-800 dark:text-purple-300 transition-colors">
                Bagikan Makanan
            </p>

            <h1 class="text-3xl font-extrabold leading-tight tracking-tight text-slate-950 dark:text-white transition-colors">
                Posting makanan sisa
            </h1>

            <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300 transition-colors">
                Unggah foto, isi detail lokasi, dan tentukan waktu pengambilan.
                Postingan akan muncul di feed orang sekitar.
            </p>
        </div>
    </div>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors">
            <label for="title" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Judul Makanan</label>
            <input id="title" name="title" type="text" value="{{ old('title') }}" required placeholder="Contoh: Nasi box ayam"
                class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-black px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:border-purple-400 dark:focus:border-purple-500 focus:bg-black dark:focus:bg-black focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30">
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors">
            <label for="description" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Deskripsi</label>
            <textarea id="description" name="description" rows="4" placeholder="Jelaskan kondisi makanan, jumlah porsi, dan informasi penting lainnya."
                class="w-full resize-none rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-black px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:border-purple-400 dark:focus:border-purple-500 focus:bg-black dark:focus:bg-black focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30">{{ old('description') }}</textarea>
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors">
            <label for="location_text" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Lokasi Pengambilan</label>
            <input id="location_text" name="location_text" type="text" value="{{ old('location_text') }}" required placeholder="Contoh: Lobi Apartemen X"
                class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-black px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:border-purple-400 dark:focus:border-purple-500 focus:bg-black dark:focus:bg-black focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30">
            <p class="mt-2 text-xs leading-5 text-slate-500 dark:text-slate-400">Contoh: depan minimarket, rumah blok B, atau lobby gedung.</p>
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors">
            <label for="available_until" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Tersedia Sampai</label>
            <input id="available_until" name="available_until" type="datetime-local" value="{{ old('available_until') }}" required
                class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-black px-4 py-4 text-sm text-slate-900 dark:text-white outline-none transition placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:border-purple-400 dark:focus:border-purple-500 focus:bg-black dark:focus:bg-black focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30">
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors">
            <label for="label" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Label</label>
            <select id="label" name="label" required class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-black px-4 py-4 text-sm font-semibold text-slate-900 dark:text-white outline-none transition focus:border-purple-400 dark:focus:border-purple-500 focus:bg-black dark:focus:bg-black focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30">
                <option value="Gratis" class="dark:bg-black" {{ old('label') === 'Gratis' ? 'selected' : '' }}>Gratis</option>
                <option value="Harga Diskon" class="dark:bg-black" {{ old('label') === 'Harga Diskon' ? 'selected' : '' }}>Harga Diskon</option>
            </select>
        </div>

        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl shadow-purple-100/70 dark:shadow-none transition-colors">
            <label for="photo" class="mb-2 block text-sm font-bold text-slate-700 dark:text-slate-200">Foto Makanan</label>
            <label for="photo" class="flex cursor-pointer flex-col items-center justify-center rounded-[24px] border-2 border-dashed border-purple-200 dark:border-slate-600 bg-purple-50/50 dark:bg-black px-4 py-8 text-center transition hover:bg-purple-50 dark:hover:bg-slate-900">
                <span class="flex h-14 w-14 items-center justify-center rounded-full bg-purple-100 dark:bg-slate-800 text-2xl">📷</span>
                <span class="mt-3 text-sm font-bold text-purple-800 dark:text-purple-300">Pilih atau ambil foto</span>
                <span class="mt-1 text-xs leading-5 text-slate-500 dark:text-slate-400">Upload foto makanan dari galeri atau kamera.</span>
            </label>
            <input id="photo" type="file" name="photo" accept="image/*" required class="sr-only">
        </div>

        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">

        <button type="submit" class="w-full rounded-full bg-purple-600 dark:bg-purple-500 px-6 py-4 text-sm font-bold text-white shadow-lg shadow-purple-300/60 dark:shadow-none transition hover:bg-purple-700 dark:hover:bg-purple-600">
            Posting Makanan
        </button>
    </form>
</section>

<script>
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((pos) => {
            document.getElementById('latitude').value = pos.coords.latitude;
            document.getElementById('longitude').value = pos.coords.longitude;
        });
    }
</script>
@endsection