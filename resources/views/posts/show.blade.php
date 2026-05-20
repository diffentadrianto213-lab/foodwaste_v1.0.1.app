@extends('layouts.app')

@section('title', $post->title)

@section('content')
@php
    $isOwner = $post->user_id === auth()->id();
    $isAvailable = $post->status === 'available';
    $owner = $post->owner;
    $ownerName = $owner?->name ?? 'Pengguna';
@endphp

<section class="space-y-5">
    <div class="overflow-hidden rounded-[32px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 shadow-2xl shadow-purple-200/60 dark:shadow-none transition-colors duration-300">
        <div class="relative">
            @if($post->photo_path)
                <img src="{{ asset('storage/' . $post->photo_path) }}" alt="{{ $post->title }}" class="aspect-[4/3] w-full object-cover">
            @else
                <div class="flex aspect-[4/3] w-full items-center justify-center bg-gradient-to-br from-amber-100 dark:from-amber-900/30 via-orange-50 dark:via-slate-800 to-purple-100 dark:to-slate-900 transition-colors">
                    <div class="flex h-24 w-24 items-center justify-center rounded-[32px] bg-black/80 dark:bg-slate-700/80 text-5xl shadow-xl transition-colors">🍱</div>
                </div>
            @endif

            <a href="{{ route('feed') }}" class="absolute left-4 top-4 flex h-10 w-10 items-center justify-center rounded-full bg-black/90 dark:bg-slate-800/90 text-lg font-extrabold text-slate-800 dark:text-white shadow-lg backdrop-blur transition-colors">
                ←
            </a>

            <span class="absolute right-4 top-4 rounded-full bg-black/90 dark:bg-slate-800/90 px-3 py-1.5 text-xs font-extrabold text-purple-800 dark:text-purple-300 shadow-lg backdrop-blur transition-colors">
                {{ $post->label }}
            </span>
        </div>

        <div class="p-5">
            <div class="flex flex-wrap gap-2">
                <span class="rounded-full bg-emerald-100 dark:bg-emerald-900/40 px-3 py-1.5 text-xs font-bold text-emerald-700 dark:text-emerald-400 transition-colors">{{ $post->label }}</span>
                <span class="rounded-full bg-purple-100 dark:bg-purple-900/40 px-3 py-1.5 text-xs font-bold text-purple-700 dark:text-purple-400 transition-colors">Food</span>
                <span class="rounded-full bg-blue-100 dark:bg-blue-900/40 px-3 py-1.5 text-xs font-bold text-blue-700 dark:text-blue-400 transition-colors">Lokal</span>
            </div>

            <h1 class="mt-4 text-2xl font-extrabold leading-tight tracking-tight text-slate-950 dark:text-white transition-colors">
                {{ $post->title }}
            </h1>

            <div class="mt-4 flex items-center gap-3 border-b border-purple-100 dark:border-slate-700 pb-4 transition-colors">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-900/40 text-sm font-extrabold text-emerald-700 dark:text-emerald-400 transition-colors">
                    {{ strtoupper(substr($ownerName, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-extrabold text-slate-950 dark:text-white transition-colors">{{ $ownerName }}</p>
                    <p class="mt-1 text-xs font-medium text-slate-500 dark:text-slate-400 transition-colors">Membagikan makanan ini</p>
                </div>
            </div>

            <div class="mt-5 space-y-5">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wide text-slate-400 dark:text-slate-500">Description</p>
                    <p class="mt-2 text-sm leading-6 text-slate-700 dark:text-slate-300 transition-colors">
                        {{ $post->description ?: 'Tidak ada deskripsi tambahan.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-3">
                    <div class="rounded-2xl bg-purple-50/70 dark:bg-slate-700/50 p-4 transition-colors">
                        <p class="text-sm font-bold text-slate-950 dark:text-white">Tersedia sampai</p>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">{{ $post->available_until->format('d M Y H:i') }}</p>
                    </div>
                    <div class="rounded-2xl bg-purple-50/70 dark:bg-slate-700/50 p-4 transition-colors">
                        <p class="text-sm font-bold text-slate-950 dark:text-white">Status</p>
                        <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">{{ ucfirst($post->status) }}</p>
                    </div>
                    <div class="rounded-2xl bg-purple-50/70 dark:bg-slate-700/50 p-4 transition-colors">
                        <p class="text-sm font-bold text-slate-950 dark:text-white">{{ $post->location_text }}</p>
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200 dark:border-amber-900 bg-amber-50 dark:bg-amber-950/30 p-4 text-xs leading-5 text-amber-900 dark:text-amber-200 transition-colors">
                    Pastikan makanan masih layak dikonsumsi. Cek kondisi makanan, waktu tersedia, dan detail lokasi sebelum mengambil.
                </div>
            </div>
        </div>
    </div>

    @if(!$isOwner && $isAvailable)
        <div class="rounded-[28px] border border-purple-100 dark:border-slate-700 bg-black dark:bg-slate-800 p-5 shadow-xl dark:shadow-none transition-colors">
            <h2 class="text-xl font-extrabold text-slate-950 dark:text-white">Tertarik dengan makanan ini?</h2>
            <form method="POST" action="{{ route('posts.request', $post) }}" class="mt-5 space-y-4">
                @csrf
                <textarea name="message" rows="3" placeholder="Halo kak, makanannya masih tersedia?" 
                    class="w-full rounded-2xl border border-purple-100 dark:border-slate-600 bg-purple-50/40 dark:bg-slate-700 px-4 py-4 text-sm text-slate-900 dark:text-white outline-none focus:ring-4 focus:ring-purple-100 dark:focus:ring-purple-900/30 transition-all"></textarea>
                <button type="submit" class="w-full rounded-full bg-purple-600 dark:bg-purple-500 py-4 text-sm font-bold text-white transition hover:bg-purple-700 dark:hover:bg-purple-600">Request Item</button>
            </form>
            @if($owner)
                <a href="{{ route('chats.show', [$post, $owner]) }}" class="mt-3 flex w-full items-center justify-center rounded-full border border-purple-300 dark:border-purple-600 bg-black dark:bg-slate-800 py-4 text-sm font-bold text-purple-800 dark:text-purple-300 transition hover:bg-purple-50 dark:hover:bg-slate-700">Chat Pemilik</a>
            @endif
        </div>
    @endif
</section>
@endsection