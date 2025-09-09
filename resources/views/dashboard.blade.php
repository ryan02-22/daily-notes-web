<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-blue-900 to-slate-900 overflow-hidden shadow sm:rounded-xl border border-blue-800">
                <div class="p-6 text-blue-50">
                    <p class="mb-4">{{ __("You're logged in!") }}</p>
                    <a href="{{ route('notes.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Ke List Notes</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
