<x-app-layout>
    <div class="page-wrap">
        @if (session('status'))
            <div class="flash-message" role="status">{{ session('status') }}</div>
        @endif

        <section class="welcome-panel" aria-labelledby="notes-welcome-title">
            <div class="welcome-copy">
                <p class="eyebrow">Ruang pribadimu</p>
                <h1 class="welcome-title" id="notes-welcome-title">Halo, {{ Auth::user()->name }}! 👋<br>Simpan ide serumu di sini.</h1>
                <p class="welcome-description">Tempat yang nyaman untuk menyimpan ide, rencana, dan hal-hal kecil yang ingin kamu ingat.</p>
            </div>
            <div class="welcome-action">
                <a class="button button-primary" href="{{ route('notes.create') }}">
                    <span aria-hidden="true">＋</span> Buat catatan
                </a>
            </div>
        </section>

        <div class="page-heading">
            <div>
                <p class="eyebrow">Koleksimu</p>
                <h2 class="page-title">Semua catatan</h2>
                <p class="page-subtitle">Ide-ide baikmu tersimpan rapi dan siap ditemukan lagi.</p>
            </div>
        </div>

        <div class="toolbar">
            <p class="results-label">
                {{ $notes->total() }} catatan
                @if (filled($searchQuery))
                    <span> untuk “{{ $searchQuery }}”</span>
                @endif
            </p>
            <form class="search-form" method="GET" action="{{ route('notes.index') }}" role="search">
                <label class="sr-only" for="notes-search">Cari catatan</label>
                <input
                    class="search-input"
                    id="notes-search"
                    type="search"
                    name="q"
                    value="{{ $searchQuery }}"
                    placeholder="Cari catatan..."
                >
                <button class="button button-secondary" type="submit">Cari</button>
                @if (filled($searchQuery))
                    <a class="button button-secondary" href="{{ route('notes.index') }}" aria-label="Hapus pencarian">Hapus</a>
                @endif
            </form>
        </div>

        @if ($notes->count())
            <div class="note-grid">
                @foreach ($notes as $note)
                    <article @class(['note-card', 'note-card--' . (($loop->index % 3) + 1)])>
                        <div class="note-card-top">
                            <span class="note-category">{{ $note->category ?: 'Pribadi' }}</span>
                            <span @class(['status-pill', 'is-archived' => $note->status === 'archived'])>
                                {{ $note->status === 'archived' ? 'Diarsipkan' : 'Aktif' }}
                            </span>
                        </div>

                        <h3 class="note-card-title">{{ $note->title }}</h3>
                        <p class="note-excerpt">{{ \Illuminate\Support\Str::limit($note->content, 150) }}</p>

                        <div class="note-card-footer">
                            <time class="note-date" datetime="{{ $note->created_at->toDateString() }}">
                                {{ $note->created_at->format('d/m/Y') }}
                            </time>
                            <div class="note-actions">
                                <a class="button button-secondary button-small" href="{{ route('notes.show', $note) }}">Lihat</a>
                                <a class="button button-secondary button-small" href="{{ route('notes.edit', $note) }}">Ubah</a>
                                <form method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="return confirm('Hapus catatan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="icon-button" type="submit" aria-label="Hapus {{ $note->title }}" title="Hapus catatan">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M4 7h16M10 11v6m4-6v6M6 7l1 13h10l1-13M9 7V4h6v3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if ($notes->hasPages())
                <div class="pagination-wrap">{{ $notes->links() }}</div>
            @endif
        @else
            <section class="empty-state">
                <div class="empty-icon" aria-hidden="true">✎</div>
                @if (filled($searchQuery))
                    <h3 class="empty-title">Catatan tidak ditemukan</h3>
                    <p class="empty-copy">Coba kata kunci lain, atau hapus pencarian untuk melihat semua catatan.</p>
                    <a class="button button-secondary" href="{{ route('notes.index') }}">Hapus pencarian</a>
                @else
                    <h3 class="empty-title">Belum ada catatan</h3>
                    <p class="empty-copy">Mulai dengan menyimpan ide pertamamu. Kamu bisa melengkapinya kapan saja.</p>
                    <a class="button button-primary" href="{{ route('notes.create') }}">Buat catatan pertama</a>
                @endif
            </section>
        @endif
    </div>
</x-app-layout>
