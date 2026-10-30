<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Daily Notes') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="public-home">
        <header class="topbar">
            <div class="topbar-inner">
                <a class="brand" href="{{ url('/') }}">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M7 3.75h7.1L19 8.6v11.65H7a2 2 0 0 1-2-2v-12.5a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M14 4v5h5M8.5 13h7M8.5 16.5h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span>Daily Notes</span>
                </a>

                <div class="nav-actions">
                    @auth
                        <a class="button button-primary" href="{{ route('notes.index') }}">Buka catatan saya</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        <a class="button button-primary" href="{{ route('register') }}">Mulai sekarang</a>
                    @endauth
                </div>
            </div>
        </header>

        <section class="page-wrap public-hero">
            <div>
                <p class="eyebrow">Ruang lebih untuk berpikir</p>
                <h1 class="public-title">Semua pikiranmu,<br><span>tersimpan rapi.</span></h1>
                <p class="public-copy">Tempat sederhana dan nyaman untuk menyimpan ide, pengingat, serta rencana. Tulis sekarang dan temukan lagi saat kamu membutuhkannya.</p>
                @auth
                    <a class="button button-primary" href="{{ route('notes.index') }}">Buka catatan saya <span aria-hidden="true">→</span></a>
                @else
                    <a class="button button-primary" href="{{ route('register') }}">Buat akun <span aria-hidden="true">→</span></a>
                    <p class="form-help" style="margin-top: 12px;">Sudah punya akun? <a class="text-link" href="{{ route('login') }}">Masuk</a></p>
                @endauth
            </div>

            <div class="preview-stack" aria-hidden="true">
                <div class="preview-card">
                    <span class="note-category">Ide kecil</span>
                    <h2 class="note-card-title">Pasar akhir pekan</h2>
                    <div class="preview-line"></div>
                    <div class="preview-line short"></div>
                </div>
                <div class="preview-card">
                    <span class="note-category">Jangan lupa</span>
                    <h2 class="note-card-title">Hubungi Sam soal liburan</h2>
                    <div class="preview-line"></div>
                    <div class="preview-line short"></div>
                </div>
                <div class="preview-card">
                    <span class="note-category">Untuk nanti</span>
                    <h2 class="note-card-title">Resep yang ingin dicoba</h2>
                    <div class="preview-line"></div>
                    <div class="preview-line short"></div>
                </div>
            </div>
        </section>

        <footer class="public-footer">Tempat tenang untuk semua hal yang ingin kamu ingat.</footer>
    </main>
</body>
</html>
