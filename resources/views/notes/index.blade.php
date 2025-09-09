<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-br from-blue-900 to-slate-900 overflow-hidden shadow-lg sm:rounded-2xl border border-blue-800">
                <div class="p-6 text-blue-50">
                    @if(session('status'))
                        <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
                    @endif

                    <div id="grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($notes as $note)
                            <div class="rounded-xl p-4 flex flex-col bg-gradient-to-br from-blue-800 to-indigo-900 shadow border border-indigo-800">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-white">{{ $note->title }}</h3>
                                    <span class="text-xs px-2 py-1 rounded bg-blue-600/30 text-blue-200 border border-blue-500/30">{{ $note->status }}</span>
                                </div>
                                <p class="mt-2 text-sm line-clamp-3 text-blue-100">{{ Str::limit($note->content, 160) }}</p>
                                <div class="mt-4 flex gap-2">
                                    <a class="px-3 py-1 text-sm rounded-md text-white bg-indigo-500 hover:bg-indigo-600" href="{{ route('notes.show', $note) }}">Lihat</a>
                                    <a class="px-3 py-1 text-sm rounded-md text-white bg-blue-500 hover:bg-blue-600" href="{{ route('notes.edit', $note) }}">Edit</a>
                                    <form method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="return confirm('Hapus note ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-sm rounded-md text-white bg-slate-700 hover:bg-slate-600">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="text-center py-16 border-2 border-dashed rounded-xl border-blue-800 text-blue-100">
                                    <h3 class="text-lg font-semibold mb-2">Belum ada catatan</h3>
                                    <p class="text-sm opacity-80 mb-4">Mulai buat catatan pertama Anda sekarang.</p>
                                    <a href="{{ route('notes.create') }}" class="inline-flex items-center px-4 py-2 rounded-md text-white bg-indigo-500 hover:bg-indigo-600">Buat Catatan</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-6">{{ $notes->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


