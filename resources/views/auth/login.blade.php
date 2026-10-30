<x-guest-layout>
<div>
    <p class="eyebrow">Ruangmu menunggu</p>
    <h2 class="auth-heading">Senang bertemu lagi!</h2>
    <p class="auth-description">Masuk dan lanjutkan menyimpan hal-hal yang berarti buatmu.</p>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form class="auth-form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-field">
            <x-input-label for="email" value="Alamat email" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="form-error" />
        </div>
        <div class="form-field">
            <x-input-label for="password" value="Kata sandi" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi" />
            <x-input-error :messages="$errors->get('password')" class="form-error" />
        </div>
        <div class="guest-actions">
            <label class="checkbox-row" for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-link" href="{{ route('password.request') }}">Lupa kata sandi?</a>
            @endif
        </div>

        <button class="button button-primary" type="submit">Masuk</button>
    </form>

    <p class="auth-footer">
        Belum punya akun? <a class="text-link" href="{{ route('register') }}">Buat akun</a>
    </p>
</div>
</x-guest-layout>
