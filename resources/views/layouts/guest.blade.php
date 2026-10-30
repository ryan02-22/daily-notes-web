<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Daily Notes</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased auth-page">
        <main class="auth-shell">
            <aside class="auth-aside">
                <a class="brand" href="{{ url('/') }}">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M7 3.75h7.1L19 8.6v11.65H7a2 2 0 0 1-2-2v-12.5a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M14 4v5h5M8.5 13h7M8.5 16.5h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span>Daily Notes</span>
                </a>

                <div class="auth-aside-content">
                    <p class="eyebrow">Ruang kecil untuk harimu</p>
                    <h1 class="auth-aside-title">Sediakan ruang untuk pikiranmu.</h1>
                    <p class="auth-aside-copy">Tempat sederhana untuk menyimpan hal-hal kecil yang ingin kamu ingat.</p>
                </div>

                <div class="auth-note">
                    ✨ &nbsp;Ide kecil bisa jadi sesuatu yang berarti. Simpan untuk nanti.
                </div>
            </aside>

            <section class="auth-content">
                {{ $slot }}
            </section>
        </main>
    </body>
</html>
