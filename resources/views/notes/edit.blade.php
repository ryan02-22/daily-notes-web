<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit Note</h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('notes.update', $note) }}" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label value="Judul" />
                            <x-text-input name="title" class="mt-1 block w-full" value="{{ old('title', $note->title) }}" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label value="Kategori" />
                            <x-text-input name="category" class="mt-1 block w-full" value="{{ old('category', $note->category) }}" />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label value="Status" />
                            <select name="status" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900">
                                <option value="active" {{ old('status', $note->status)==='active'?'selected':'' }}>Active</option>
                                <option value="archived" {{ old('status', $note->status)==='archived'?'selected':'' }}>Archived</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label value="Konten" />
                            <textarea name="content" rows="8" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900">{{ old('content', $note->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('notes.index') }}" class="px-4 py-2 rounded-md border">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


