<div>
    <x-loading />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid ga-2 grid-cols-12">
                        <div class="col-span-3">
                            @include('livewire.super-admin.sidebar')
                        </div>
                        <div class="col-span-9">
                            <div class="mb-3 text-right">
                                @if ($koneksi)
                                <x-primary-button wire:click='pengaturanKoneksi'>Koneksi</x-primary-button>
                                @else
                                <x-danger-button wire:click='pengaturanKoneksi'>Koneksi</x-danger-button>
                                @endif
                            </div>
                            <div>
                                <table class="w-full">
                                    <tbody>
                                        <tr class="border-b">
                                            <td class="p-4">Sekolah</td>
                                            <td class="p-4">{{ $sekolah }}</td>
                                            <td class="text-center p-2"><button wire:click='getSekolah'>Syncron</button>
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">GTK</td>
                                            <td class="p-4">{{ $gtk }}</td>
                                            <td class="text-center p-2"><button wire:click='getGtk'>Syncron</button>
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">Rwy Kepangkatan</td>
                                            <td class="p-4">{{ $kepangkatan }}</td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">Rwy Pend Formal</td>
                                            <td class="p-4">{{ $pend_formal }}</td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">Rombel</td>
                                            <td class="p-4">{{ $rombel }}</td>
                                            <td class="text-center p-2"><button
                                                    wire:click='getRombonganBelajar'>Syncron</button>
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">Anggota Rombel</td>
                                            <td class="p-4">{{ $anggota_rombel }}</td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">Pembelajaran</td>
                                            <td class="p-4">{{ $pembelajaran }}</td>
                                        </tr>
                                        <tr class="border-b">
                                            <td class="p-4">Pengguna</td>
                                            <td class="p-4">{{ $pengguna }}</td>
                                            <td class="text-center p-2"><button
                                                    wire:click='getPengguna'>Syncron</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($modal)
    <x-modals>
        @if ($modal==='updateKoneksi')
        @include('livewire.super-admin.koneksi-form')
        @endif
    </x-modals>
    @endif
</div>