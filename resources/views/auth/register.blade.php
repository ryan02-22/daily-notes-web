<x-guest-layout>
<div>
    <p class="eyebrow">Satu langkah kecil</p>
    <h2 class="auth-heading">Buat ruang untuk idemu</h2>
    <p class="auth-description">Buat akun dan mulai simpan catatan yang ingin kamu ingat.</p>

    <form class="auth-form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-field">
            <x-input-label for="name" value="Nama" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama kamu" />
            <x-input-error :messages="$errors->get('name')" class="form-error" />
        </div>
        <div class="form-field">
            <x-input-label for="email" value="Alamat email" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="form-error" />
        </div>
        <div class="form-field">
            <x-input-label for="password" value="Kata sandi" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Buat kata sandi" />
            <x-input-error :messages="$errors->get('password')" class="form-error" />
        </div>

        <div class="form-field">
            <x-input-label for="password_confirmation" value="Ulangi kata sandi" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan ulang kata sandi" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="form-error" />
        </div>

        <button class="button button-primary" type="submit">Daftar</button>
    </form>

    <p class="auth-footer">
        Sudah punya akun? <a class="text-link" href="{{ route('login') }}">Masuk</a>
    </p>
</div>
</x-guest-layout>
