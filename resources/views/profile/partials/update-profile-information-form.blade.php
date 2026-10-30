<section>
    <header>
        <h2 class="auth-heading">
            Informasi profil
        </h2>

        <p class="page-subtitle">
            Perbarui nama dan alamat email yang terhubung ke akunmu.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="form-stack" style="margin-top: 20px;">
        @csrf
        @method('patch')

        <div class="form-field">
            <x-input-label for="name" value="Nama" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="form-field">
            <x-input-label for="email" value="Alamat email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="form-help">
                        Alamat emailmu belum diverifikasi.

                        <button form="send-verification" class="text-link" style="border: 0; background: transparent; cursor: pointer;">
                            Klik di sini untuk mengirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="form-help">
                            Tautan verifikasi baru telah dikirim ke alamat emailmu.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Simpan</x-primary-button>

            @if (session('status') === 'profile-updated')
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
