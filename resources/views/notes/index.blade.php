<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Notes
            </h2>
            <a href="{{ route('notes.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Notes
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-br from-blue-900 to-slate-900 overflow-hidden shadow-lg sm:rounded-2xl border border-blue-800">
                <div class="p-6 text-blue-50">
                    @if(session('status'))
                        <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
                    @endif

                    <!-- Search Bar -->
                    <div class="mb-6">
                        <form method="GET" action="{{ route('notes.index') }}" class="flex gap-4 items-center">
                            <div class="flex-1">
                                <div class="relative">
                                    <input type="text" name="q" value="{{ $searchQuery }}" 
                                           placeholder="Cari catatan..." 
                                           class="w-full px-4 py-2 pl-10 bg-blue-800/50 border border-blue-700 rounded-lg text-white placeholder-blue-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <svg class="w-5 h-5 text-blue-300 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-150">
                                Cari
                            </button>
                            @if($searchQuery)
                                <a href="{{ route('notes.index') }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-150">
                                    Reset
                                </a>
                            @endif
                        </form>
                    </div>

                    @if($notes->count() > 0)
                        <div class="mb-6 flex justify-between items-center">
                            <p class="text-blue-100">
                                @if($searchQuery)
                                    Ditemukan {{ $notes->total() }} catatan untuk "{{ $searchQuery }}"
                                @else
                                    Total: {{ $notes->total() }} catatan
                                @endif
                            </p>
                            <a href="{{ route('notes.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-lg transition duration-150 ease-in-out">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Buat Catatan Baru
                            </a>
                        </div>
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

    <!-- Floating Action Button -->
    <div class="fixed bottom-8 right-8 z-50">
        <a href="{{ route('notes.create') }}" 
           class="group flex items-center justify-center w-14 h-14 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-200 ease-in-out">
            <svg class="w-6 h-6 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span class="sr-only">Tambah Notes</span>
        </a>
        
        <!-- Tooltip -->
        <div class="absolute bottom-16 right-0 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
            <div class="bg-gray-900 text-white text-sm px-3 py-2 rounded-lg shadow-lg whitespace-nowrap">
                Tambah Notes Baru
                <div class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
            </div>
        </div>
    </div>
</x-app-layout>


