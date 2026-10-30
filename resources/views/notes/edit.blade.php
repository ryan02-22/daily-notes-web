<x-app-layout>
    <div class="page-wrap">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Lanjutkan merapikan</p>
                <h1 class="page-title">Ubah catatan</h1>
                <p class="page-subtitle">Perbarui detail yang kamu perlukan, lalu simpan perubahan.</p>
            </div>
        </div>

        <section class="form-panel">
            <form method="POST" action="{{ route('notes.update', $note) }}" class="form-stack">
                @csrf
                @method('PUT')

                <div class="form-field">
                    <x-input-label for="title" value="Judul" />
                    <x-text-input id="title" name="title" type="text" :value="old('title', $note->title)" required autofocus maxlength="255" />
                    <x-input-error :messages="$errors->get('title')" class="form-error" />
                </div>

                <div class="form-field">
                    <x-input-label for="category" value="Kategori" />
                    <x-text-input id="category" name="category" type="text" :value="old('category', $note->category)" placeholder="Contoh: Ide, Pekerjaan, Pribadi" maxlength="100" />
                    <x-input-error :messages="$errors->get('category')" class="form-error" />
                </div>

                <div class="form-field">
                    <x-input-label for="status" value="Status" />
                    <select class="form-control" id="status" name="status">
                        <option value="active" @selected(old('status', $note->status) === 'active')>Aktif</option>
                        <option value="archived" @selected(old('status', $note->status) === 'archived')>Diarsipkan</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="form-error" />
                </div>

                <div class="form-field">
                    <x-input-label for="content" value="Isi catatan" />
                    <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content', $note->content) }}</textarea>
                    <x-input-error :messages="$errors->get('content')" class="form-error" />
                </div>

                <div class="form-actions">
                    <a class="button button-secondary" href="{{ route('notes.show', $note) }}">Batal</a>
                    <button class="button button-primary" type="submit">Simpan perubahan</button>
                </div>
            </form>
        </section>
    </div>
</x-app-layout>
