<x-app-layout>
    <div class="page-wrap">
        <div class="page-heading">
            <div>
                <p class="eyebrow">Mulai dari satu ide</p>
                <h1 class="page-title">Apa yang ingin kamu simpan?</h1>
                <p class="page-subtitle">Tulis dengan bebas. Catatan ini hanya bisa dilihat olehmu.</p>
            </div>
        </div>

        <section class="form-panel">
            <form method="POST" action="{{ route('notes.store') }}" class="form-stack">
                @csrf

                <div class="form-field">
                    <x-input-label for="title" value="Judul catatan" />
                    <x-text-input id="title" name="title" type="text" :value="old('title')" placeholder="Contoh: Ide untuk akhir pekan" required autofocus maxlength="255" />
                    <x-input-error :messages="$errors->get('title')" class="form-error" />
                </div>

                <div class="form-field">
                    <x-input-label for="category" value="Kategori" />
                    <x-text-input id="category" name="category" type="text" :value="old('category')" placeholder="Contoh: Ide, Pekerjaan, Pribadi" maxlength="100" />
                    <p class="form-help">Opsional. Kategori membantu kamu mengenali catatan ini.</p>
                    <x-input-error :messages="$errors->get('category')" class="form-error" />
                </div>

                <div class="form-field">
                    <x-input-label for="status" value="Status" />
                    <select class="form-control" id="status" name="status">
                        <option value="active" @selected(old('status', 'active') === 'active')>Aktif</option>
                        <option value="archived" @selected(old('status') === 'archived')>Diarsipkan</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="form-error" />
                </div>

                <div class="form-field">
                    <x-input-label for="content" value="Isi catatan" />
                    <textarea class="form-control" id="content" name="content" rows="8" placeholder="Mulai tulis di sini... Tidak harus sempurna, yang penting tersimpan." required>{{ old('content') }}</textarea>
                    <x-input-error :messages="$errors->get('content')" class="form-error" />
                </div>

                <div class="form-actions">
                    <a class="button button-secondary" href="{{ route('notes.index') }}">Batal</a>
                    <button class="button button-primary" type="submit">Simpan catatan</button>
                </div>
            </form>
        </section>
    </div>
</x-app-layout>
