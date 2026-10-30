<x-guest-layout>
<div>
    <p class="eyebrow">Bantuan akun</p>
    <h2 class="auth-heading">Atur ulang kata sandi</h2>
    <p class="auth-description">Masukkan alamat email akunmu. Kami akan mengirim tautan untuk mengatur ulang kata sandi.</p>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form class="auth-form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-field">
            <x-input-label for="email" value="Alamat email" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="form-error" />
        </div>
        <button class="button button-primary" type="submit">Kirim tautan reset</button>
    </form>

    <p class="auth-footer"><a class="text-link" href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
</div>
</x-guest-layout>
