<x-guest-layout>
<div>
    <p class="eyebrow">Bantuan akun</p>
    <h2 class="auth-heading">Buat kata sandi baru</h2>
    <p class="auth-description">Gunakan kata sandi baru untuk akun Daily Notes-mu.</p>

    <form class="auth-form" method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-field">
            <x-input-label for="email" value="Alamat email" />
            <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="form-error" />
        </div>
        <div class="form-field">
            <x-input-label for="password" value="Kata sandi baru" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Buat kata sandi baru" />
            <x-input-error :messages="$errors->get('password')" class="form-error" />
        </div>
        <div class="form-field">
            <x-input-label for="password_confirmation" value="Ulangi kata sandi baru" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Masukkan ulang kata sandi baru" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="form-error" />
        </div>

        <button class="button button-primary" type="submit">Simpan kata sandi</button>
    </form>
</div>
</x-guest-layout>
