<x-app-layout class="min-h-screen text-gray-100 bg-gradient-to-b from-gray-900 to-gray-800">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Edit Note
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Card -->
            <div class="bg-gray-800 shadow sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('notes.update', $note) }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <!-- Judul -->
                        <div>
                            <x-input-label value="Judul" class="text-gray-300" />
                            <x-text-input 
                                name="title"
                                class="mt-1 block w-full bg-gray-900 text-gray-100 border-gray-700 focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('title', $note->title) }}"
                            />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Kategori -->
                        <div>
                            <x-input-label value="Kategori" class="text-gray-300" />
                            <x-text-input 
                                name="category"
                                class="mt-1 block w-full bg-gray-900 text-gray-100 border-gray-700 focus:border-blue-500 focus:ring-blue-500"
                                value="{{ old('category', $note->category) }}"
                            />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label value="Status" class="text-gray-300" />
                            <select 
                                name="status"
                                class="mt-1 block w-full bg-gray-900 text-gray-100 border-gray-700 focus:border-blue-500 focus:ring-blue-500">
                                <option value="active" {{ old('status', $note->status)==='active' ? 'selected' : '' }}>Active</option>
                                <option value="archived" {{ old('status', $note->status)==='archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Konten -->
                        <div>
                            <x-input-label value="Konten" class="text-gray-300" />
                            <textarea 
                                name="content" rows="8"
                                class="mt-1 block w-full bg-gray-900 text-gray-100 border-gray-700 focus:border-blue-500 focus:ring-blue-500"
                            >{{ old('content', $note->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('notes.index') }}"
                               class="px-4 py-2 rounded-md border border-gray-600 text-white hover:bg-gray-700">
                                Batal
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Card -->
        </div>
    </div>
</x-app-layout>

<!-- Tambahan CSS untuk logo Laravel -->
<style>
    header svg {
        color: black !important;
    }
</style>
