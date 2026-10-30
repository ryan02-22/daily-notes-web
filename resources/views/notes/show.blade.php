<x-app-layout>
    <div class="page-wrap">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Dari koleksimu</p>
                <h1 class="page-title">Baca kembali idemu</h1>
                <p class="page-subtitle">Satu catatan kecil, siap ditemukan kapan saja.</p>
            </div>
            <a class="button button-secondary" href="{{ route('notes.index') }}">← Semua catatan</a>
        </div>

        <article class="detail-panel">
            <div class="detail-header">
                <div>
                    <p class="eyebrow">{{ $note->category ?: 'Pribadi' }} · {{ $note->created_at->translatedFormat('j F Y') }}</p>
                    <h2 class="detail-title">{{ $note->title }}</h2>
                </div>
                <span @class(['status-pill', 'is-archived' => $note->status === 'archived'])>{{ $note->status === 'archived' ? 'Diarsipkan' : 'Aktif' }}</span>
            </div>

            <div class="detail-content">{{ $note->content }}</div>

            <div class="form-actions">
                <a class="button button-secondary" href="{{ route('notes.index') }}">Kembali ke catatan</a>
                <a class="button button-primary" href="{{ route('notes.edit', $note) }}">Ubah catatan</a>
            </div>
        </article>
    </div>
</x-app-layout>
