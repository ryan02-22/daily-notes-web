<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-indigo-400 to-violet-500">
            ✨ Notes
        </h2>
       
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('notes.create') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-blue-100">
                                        ➕ Buat Catatan
                                    </a>
            <!-- Container -->
            <div class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 overflow-hidden shadow-2xl sm:rounded-3xl border border-slate-800">
                <div class="p-10 text-slate-300">
                    
                    @if(session('status'))
                        <div class="mb-6 px-4 py-3 rounded-lg bg-emerald-800/30 text-emerald-300 border border-emerald-700/40">
                            ✅ {{ session('status') }}
                        </div>
                    @endif

                    <!-- Notes Grid -->
                    <div id="grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @forelse($notes as $note)
                            <div class="group rounded-2xl p-6 flex flex-col bg-gradient-to-br from-slate-800/70 to-slate-900/80 backdrop-blur-md shadow-lg border border-slate-700 hover:border-cyan-500/40 hover:shadow-cyan-500/20 hover:scale-[1.02] transition duration-300">
                                
                                <!-- Header -->
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-slate-200 group-hover:text-cyan-300 transition">
                                        {{ $note->title }}
                                    </h3>
                                    <span class="text-xs px-2 py-1 rounded-full bg-cyan-900/40 text-cyan-300 border border-cyan-700/40">
                                        {{ $note->status }}
                                    </span>
                                </div>

                                <!-- Content -->
                                <p class="mt-3 text-sm line-clamp-3 text-slate-400 group-hover:text-slate-200 transition">
                                    {{ Str::limit($note->content, 160) }}
                                </p>

                                <!-- Actions -->
                                <div class="mt-6 flex gap-2">
                                    <a class="flex items-center gap-1 px-3 py-1.5 text-sm rounded-md text-slate-200 bg-cyan-800 hover:bg-cyan-700 transition" href="{{ route('notes.show', $note) }}">
                                        🔍 Lihat
                                    </a>
                                    <a class="flex items-center gap-1 px-3 py-1.5 text-sm rounded-md text-slate-200 bg-indigo-800 hover:bg-indigo-700 transition" href="{{ route('notes.edit', $note) }}">
                                        ✏️ Edit
                                    </a>
                                    <form method="POST" action="{{ route('notes.destroy', $note) }}" onsubmit="return confirm('Hapus note ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center gap-1 px-3 py-1.5 text-sm rounded-md text-slate-200 bg-red-800 hover:bg-red-700 transition">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="text-center py-20 border-2 border-dashed rounded-2xl border-slate-700 text-slate-400 bg-gradient-to-br from-slate-900/80 to-slate-800/80 backdrop-blur">
                                    <h3 class="text-xl font-semibold mb-3 text-slate-200">Belum ada catatan</h3>
                                    <p class="text-sm opacity-70 mb-6">Mulai buat catatan pertama Anda sekarang.</p>
                                    <a href="{{ route('notes.create') }}" style="color:rgb(234, 51, 51)" class="inline-flex items-center gap-2 px-5 py-2 rounded-lg text-slate-200 bg-gradient-to-r from-indigo-800 to-cyan-800 hover:from-indigo-700 hover:to-cyan-700 shadow-lg transition">
                                        ➕ Buat Catatan
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $notes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
