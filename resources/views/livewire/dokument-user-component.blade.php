<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3 text-right">
                        <x-primary-button wire:click='uploadDokument'>Upload File</x-primary-button>
                    </div>

                    <div class="grid gap-2 grid-cols-3">
                        @forelse ($dokuments as $item)
                        <div class="col-span-1 bg-gray-200 p-2 max-w-xs">
                            <div>{{ $item->title }}</div>
                            @php
                            $image = file_get_contents('sisfo/public/storage/'.$item->url);
                            @endphp
                            <img src="data:image/jpeg; base64, <?= base64_encode($image) ?>" class="w-full"
                                wire:click='preview("{{ $item->dokument_id }}")'>
                            <div>{{ $item->created_at }}</div>
                        </div>
                        @empty
                        <div class="col-span-3 p-8 border rounded text-center">Belum ada file yang di upload</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($modal)
    <x-modals>
        <div>
            @if ($modal==='preview')
            <div class="flex items-center justify-center mb-3">
                @php
                $image = file_get_contents('sisfo/public/storage/'.$dokument_url);
                @endphp
                <img src="data:image/jpeg; base64, <?= base64_encode($image) ?>" alt="{{ $dokument_id }}"
                    class="max-w-xs">
            </div>
            <div>
                <x-primary-button wire:click='edit'>Ganti</x-primary-button>
                <x-danger-button wire:click='delete'>Hapus</x-danger-button>
            </div>
            @endif
            @if ($modal==='store'|| $modal==='update')
            <form wire:submit='{{ $modal }}'>
                <div class="mb-3">
                    <label>Nama File</label>
                    <input type="text" name="title" class="w-full rounded" wire:model='title' placeholder="Nama File">
                    @error('title')
                    <span class="text-red-800 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @if ($images)
                <div class="flex flex-wrap border p2 rounded items-center justify-center mb-3">

                    <img src="{{ $images->temporaryUrl() }}"
                        class="object-contain object-center max-w-xs border p-2 bg-gray-200 m-1">
                </div>
                <div wire:loading wire:target="photo" class="mb-3">Uploading...</div>
                @endif

                <div class="mb-3">
                    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-error="uploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <input type="file" name="file" class="w-full rounded border p-2" wire:model='images'
                            placeholder="File Uploads" accept="image/*">
                        <div x-show="uploading">
                            <progress max="100" x-bind:value="progress" class="my-3 w-full"></progress>
                        </div>
                    </div>
                    @error('images')
                    <span class="text-red-800 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <x-primary-button>Upload</x-primary-button>
                </div>
            </form>
            @endif
        </div>
    </x-modals>
    @endif
</div>