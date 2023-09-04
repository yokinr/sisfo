<div>
    @include('layouts.navigation')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($modal)
                    @if ($modal === 'lihat')
                    <div class="grid gap-2 grid-cols-3">
                        @forelse ($dokuments as $item)
                        <div class="border p-1 shadow-sm">
                            <div>{{ $item->title }}</div>
                            @php
                            $image = file_get_contents('sisfo/public/storage/'.$item->url);
                            @endphp
                            <img src="data:image/jpeg; base64, <?= base64_encode($image) ?>"
                                wire:click='fullItem("{{ $item->dokument_id }}")'>
                        </div>
                        @empty
                        <div class="col-span-3 border p-5 text-center">0 Results</div>
                        @endforelse
                    </div>
                    @elseif ($modal === 'fullItem')
                    <div class="text-right">
                        <button wire:click='lihat("{{ $dokument->peserta_didik_id }}")'
                            class="bg-gray-800 text-white rounded px-5 py-2">Back</button>
                    </div>
                    <div class="font-semibold text-lg">{{ $dokument->title }}</div>
                    <div class="w-full p-2 border">
                        @php
                        $image = file_get_contents('sisfo/public/storage/'.$dokument->url);
                        @endphp
                        <img src="data:image/jpeg; base64, <?= base64_encode($image) ?>" class="w-full">
                    </div>
                    @endif
                    @else
                    <div class="overflow-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-2 border">No</th>
                                    <th class="p-2 border">Nama</th>
                                    <th class="p-2 border">Rombel</th>
                                    <th class="p-2 border">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($document_list as $key => $item)
                                <tr>
                                    <td class="border p-1">{{ $key+1 }}</td>
                                    <td class="border p-1">{{ $item->peserta_didik->nama }}</td>
                                    <td class="border p-1">{{ $item->peserta_didik->nama_rombel }}</td>
                                    <td class="text-center p-1 border">
                                        <button wire:click='lihat("{{ $item->peserta_didik_id }}")'>Lihat</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-3">
                        {{ $document_list->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>