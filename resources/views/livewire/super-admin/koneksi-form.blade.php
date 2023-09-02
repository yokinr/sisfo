<form action="{{ $modal }}" wire:submit='{{ $modal }}'>
    <div class="mb-3">
        <input type="text" name="host" wire:model='form.host' placeholder="Host" class="w-full">
        @error('form.host')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <input type="text" name="token" wire:model='form.token' placeholder="Token" class="w-full">
        @error('form.token')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <input type="text" name="npsn" wire:model='form.npsn' placeholder="NPSN" class="w-full">
        @error('form.npsn')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <x-primary-button>Simpan</x-primary-button>
    </div>
</form>