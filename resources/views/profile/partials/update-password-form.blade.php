<section>
    <header>
        <h2 class="auth-heading">
            Ubah kata sandi
        </h2>

        <p class="page-subtitle">
            Gunakan kata sandi yang kuat untuk menjaga keamanan akunmu.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="form-stack" style="margin-top: 20px;">
        @csrf
        @method('put')

        <div class="form-field">
            <x-input-label for="update_password_current_password" value="Kata sandi saat ini" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="form-field">
            <x-input-label for="update_password_password" value="Kata sandi baru" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="form-field">
            <x-input-label for="update_password_password_confirmation" value="Ulangi kata sandi baru" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Simpan</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="form-help"
                >Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
