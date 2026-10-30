<x-app-layout>
    <div class="page-wrap">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Akunmu, kendalimu</p>
                <h1 class="page-title">Pengaturan profil</h1>
                <p class="page-subtitle">Kelola informasi diri dan keamanan akunmu dari satu tempat.</p>
            </div>
        </div>

        <div class="form-stack">
            <section class="profile-panel">@include('profile.partials.update-profile-information-form')</section>
            <section class="profile-panel">@include('profile.partials.update-password-form')</section>
            <section class="profile-panel">@include('profile.partials.delete-user-form')</section>
        </div>
    </div>
</x-app-layout>
