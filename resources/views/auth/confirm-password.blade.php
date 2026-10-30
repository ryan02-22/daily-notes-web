<x-guest-layout>
<div>
    <p class="eyebrow">Satu langkah lagi</p>
    <h2 class="auth-heading">Konfirmasi kata sandi</h2>
    <p class="auth-description">Untuk keamanan, konfirmasi kata sandimu sebelum melanjutkan.</p>

    <form class="auth-form" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-field">
            <x-input-label for="password" value="Kata sandi" />
            <x-text-input id="password" type="password" name="password" required autofocus autocomplete="current-password" placeholder="Masukkan kata sandi" />
            <x-input-error :messages="$errors->get('password')" class="form-error" />
        </div>
        <button class="button button-primary" type="submit">Konfirmasi</button>
    </form>
</div>
</x-guest-layout>
