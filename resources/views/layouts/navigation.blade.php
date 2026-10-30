<nav x-data="{ open: false }" class="topbar">
    <div class="topbar-inner">
        <a class="brand" href="{{ route('notes.index') }}">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M7 3.75h7.1L19 8.6v11.65H7a2 2 0 0 1-2-2v-12.5a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M14 4v5h5M8.5 13h7M8.5 16.5h5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span>Daily Notes</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('notes.index') }}" @class(['nav-link', 'is-active' => request()->routeIs('notes.*')])>Catatanku</a>
        </div>

        <div class="nav-actions">
            <x-dropdown align="right" width="48" contentClasses="dropdown-panel">
                <x-slot name="trigger">
                    <button class="nav-user" type="button" aria-label="Open account menu">
                        <span class="avatar" aria-hidden="true">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        <span>{{ Auth::user()->name }}</span>
                        <svg width="14" height="14" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.09 1.03l-4.25 4.5a.75.75 0 0 1-1.09 0l-4.25-4.5a.75.75 0 0 1 .02-1.05Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link class="dropdown-item" :href="route('profile.edit')">Pengaturan profil</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">Keluar</button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <button class="mobile-toggle" type="button" @click="open = !open" :aria-expanded="open.toString()" aria-label="Toggle navigation">
            <svg x-show="!open" width="21" height="21" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
            <svg x-show="open" x-cloak width="21" height="21" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <div class="mobile-menu" :class="{ 'is-open': open }">
        <a href="{{ route('notes.index') }}" @class(['nav-link', 'is-active' => request()->routeIs('notes.*')])>Catatanku</a>
        <a href="{{ route('profile.edit') }}" class="nav-link">Pengaturan profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link" style="width: 100%; border: 0; background: transparent; cursor: pointer;">Keluar</button>
        </form>
    </div>
</nav>
