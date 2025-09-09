<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Detail Note</h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-blue-900 to-slate-900 shadow sm:rounded-2xl border border-blue-800">
                <div class="p-6 space-y-2">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-semibold text-white">{{ $note->title }}</h3>
                        <span class="text-xs px-2 py-1 rounded bg-blue-600/30 text-blue-200 border border-blue-500/30">{{ $note->status }}</span>
                    </div>
                    <p class="text-sm text-blue-100">Kategori: {{ $note->category ?? '-' }}</p>
                    <div class="prose dark:prose-invert max-w-none">
                        <p class="text-blue-50">{{ $note->content }}</p>
                    </div>
                    <div class="mt-4 flex gap-2">
                        <a class="px-3 py-1 text-sm rounded-md text-white bg-indigo-500 hover:bg-indigo-600" href="{{ route('notes.edit', $note) }}">Edit</a>
                        <a class="px-3 py-1 text-sm rounded-md text-white bg-blue-500 hover:bg-blue-600" href="{{ route('notes.index') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


