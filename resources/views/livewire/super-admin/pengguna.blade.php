<div>
    @include('layouts.navigation')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid gap-2 grid-cols-12">
                        <div class="col-span-3">
                            @include('livewire.super-admin.sidebar')
                        </div>
                        <div class="col-span-9">
                            <div class="mb-3">
                                <input type="text" wire:model.live='search' placeholder="Search" class="p-1">
                            </div>
                            <div class="overflow-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Peran</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengguna as $key => $item)
                                        <tr class="border-b">
                                            <td class="p-1">{{ $key+1 }}</td>
                                            <td class="p-1">{{ $item->name }}</td>
                                            <td class="p-1">{{ $item->email }}</td>
                                            <td class="p-1">{{ $item->peran_id_str }}</td>
                                            <td class="p-1">
                                                @if ($item->ptk_id)
                                                {{ $item->gtk->tanggal_lahir }}
                                                @elseif ($item->peserta_didik_id)
                                                {{ $item->peserta_didik->tanggal_lahir }}
                                                @endif
                                            </td>
                                            <td class="text-sm">
                                                <button
                                                    wire:click='resetPassword("{{ $item->pengguna_id }}")'>Reset</button>
                                                <button wire:click='delete("{{ $item->pengguna_id }}")'
                                                    class="text-red-600">Delete</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="p-4 border" colspan="6">0 Results</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="my-3">
                                {{ $pengguna->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($modal)
    <x-modals>
        @if ($modal === 'updatePassword')
        <form action="{{ $modal }}" wire:submit='{{ $modal }}'>
            <div class="mb-3">
                <label>New Password</label>
                <input type="password" wire:model='password' class="w-full rounded" placeholder="New Password">
                @error('password')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Password Confirmation</label>
                <input type="password" wire:model='password_confirmation' class="w-full rounded"
                    placeholder="Password Confirmation">
                @error('password_confirmation')
                <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <x-primary-button>Reset Password</x-primary-button>
            </div>
        </form>
        @endif
    </x-modals>
    @endif
</div>