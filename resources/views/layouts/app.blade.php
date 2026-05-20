<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Food Waste App')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="min-h-screen bg-[#f4efff] dark:bg-slate-950 text-slate-950 dark:text-white antialiased transition-colors duration-300">
    <div class="flex min-h-screen items-center justify-center bg-[#f4efff] dark:bg-slate-950 px-2 py-3 transition-colors duration-300">
        
        <div class="relative h-[calc(100dvh-24px)] w-full max-w-[430px] rounded-[46px] bg-slate-950 dark:bg-black p-[6px] shadow-2xl shadow-purple-300/60 dark:shadow-none">
            
            <div class="relative flex h-full overflow-hidden rounded-[40px] bg-white dark:bg-slate-900 transition-colors duration-300">
                <div class="relative flex h-full w-full flex-col overflow-hidden bg-white dark:bg-slate-900">

                    @unless(request()->routeIs('chats.*'))
                        <header class="shrink-0 border-b border-purple-100 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 px-4 pt-[calc(env(safe-area-inset-top)+16px)] pb-4 backdrop-blur transition-colors duration-300">
                            <div class="flex items-center justify-between gap-3">
                                <a
                                    href="{{ auth()->check() ? route('feed') : url('/') }}"
                                    class="text-lg font-extrabold tracking-tight text-slate-950 dark:text-white"
                                >
                                    Food Waste
                                </a>

                                @guest
                                    <div class="flex items-center gap-2">
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-full bg-purple-600 dark:bg-purple-500 px-4 py-2 text-xs font-bold text-white shadow-lg shadow-purple-200 dark:shadow-none"
                                        >
                                            Sign Up
                                        </a>

                                        <a
                                            href="{{ route('login') }}"
                                            class="rounded-full border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-xs font-bold text-slate-700 dark:text-slate-300"
                                        >
                                            Log In
                                        </a>
                                    </div>
                                @endguest

                                @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="rounded-full border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-2 text-xs font-bold text-slate-700 dark:text-slate-300"
                                        >
                                            Logout
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </header>
                    @endunless

                    @if(session('success'))
                        <div class="mx-4 mt-4 rounded-2xl border border-emerald-200 dark:border-emerald-800/50 bg-emerald-50 dark:bg-emerald-900/20 px-4 py-3 text-sm font-semibold text-emerald-800 dark:text-emerald-300">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mx-4 mt-4 rounded-2xl border border-red-200 dark:border-red-800/50 bg-red-50 dark:bg-red-900/20 px-4 py-3 text-sm text-red-800 dark:text-red-300">
                            <ul class="list-disc pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <main class="{{ request()->routeIs('chats.*') ? 'flex-1 overflow-hidden' : 'flex-1 overflow-y-auto px-4 py-6 pb-32' }}">
                        @yield('content')
                    </main>

                    @auth
                        @unless(request()->routeIs('chats.*'))
                            <nav class="absolute bottom-0 left-0 right-0 z-[9999] border-t border-purple-100 dark:border-slate-800 bg-white/95 dark:bg-slate-900/95 px-4 pb-[calc(env(safe-area-inset-bottom)+12px)] pt-4 shadow-2xl backdrop-blur transition-colors duration-300">
                                
                                <a
                                    href="{{ route('posts.create') }}"
                                    class="absolute left-1/2 top-0 flex h-16 w-16 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full text-3xl font-bold text-white shadow-2xl shadow-purple-300/80 dark:shadow-none transition
                                    {{ request()->routeIs('posts.create')
                                        ? 'bg-purple-700 dark:bg-purple-500 scale-105'
                                        : 'bg-purple-600 dark:bg-purple-600'
                                    }}"
                                >
                                    +
                                </a>

                                <div class="grid grid-cols-4 gap-2 text-center text-[11px] font-bold">
                                    <a
                                        href="{{ route('feed') }}"
                                        class="rounded-2xl px-2 py-2 transition
                                        {{ request()->routeIs('feed')
                                            ? 'text-purple-700 dark:text-purple-400'
                                            : 'text-slate-400 dark:text-slate-500 hover:text-purple-700 dark:hover:text-purple-400'
                                        }}"
                                    >
                                        Feed
                                    </a>

                                    <a
                                        href="{{ route('posts.create') }}"
                                        class="rounded-2xl px-2 py-2 transition
                                        {{ request()->routeIs('posts.create')
                                            ? 'text-purple-700 dark:text-purple-400'
                                            : 'text-slate-400 dark:text-slate-500 hover:text-purple-700 dark:hover:text-purple-400'
                                        }}"
                                    >
                                        Share
                                    </a>

                                    <a
                                        href="{{ route('profile.history') }}"
                                        class="rounded-2xl px-2 py-2 transition
                                        {{ request()->routeIs('profile.history')
                                            ? 'text-purple-700 dark:text-purple-400'
                                            : 'text-slate-400 dark:text-slate-500 hover:text-purple-700 dark:hover:text-purple-400'
                                        }}"
                                    >
                                        History
                                    </a>

                                    <a
                                        href="{{ route('profile.index') }}"
                                        class="rounded-2xl px-2 py-2 transition
                                        {{ request()->routeIs('profile.index')
                                            ? 'text-purple-700 dark:text-purple-400'
                                            : 'text-slate-400 dark:text-slate-500 hover:text-purple-700 dark:hover:text-purple-400'
                                        }}"
                                    >
                                        Profile
                                    </a>
                                </div>
                            </nav>
                        @endunless
                    @endauth

                </div>
            </div>
        </div>
    </div>
</body>
</html>