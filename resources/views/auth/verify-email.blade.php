<x-guest-layout>
<div>
    <p class="eyebrow">Hampir selesai</p>
    <h2 class="auth-heading">Verifikasi email</h2>
    <p class="auth-description">Klik tautan yang kami kirim ke emailmu untuk memverifikasi alamat. Jika belum menerima email, kirim ulang melalui tombol di bawah.</p>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status" role="status">Tautan verifikasi baru telah dikirim ke alamat emailmu.</div>
    @endif

    <div class="auth-form">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="button button-primary" type="submit">Kirim ulang email verifikasi</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="button button-secondary" type="submit">Keluar</button>
        </form>
    </div>
</div>
</x-guest-layout>
