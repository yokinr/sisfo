<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="font-bold text-2xl mb-3">{{ auth()->user()->name }}</div>
                    @can('Peserta Didik')
                    <div class="bg-teal-100 p-2 border rounded">
                        Silahkan unggah dokumen anda <a wire:navigate href="{{ route('dokument') }}"><b>disini!</b></a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>