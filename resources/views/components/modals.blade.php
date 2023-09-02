<div class="fixed top-0 left-0 w-full h-screen bg-black bg-opacity-50 overflow-auto">
    <div class="max-w-lg mx-auto w-full my-20">
        <div class="bg-white p-5 rounded mx-2 relative">
            <button class="absolute right-1 top-1 text-gray-800 bg-white p-1 rounded font-semibold"
                wire:click='close'>x</button>
            <div class="mt-3">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>