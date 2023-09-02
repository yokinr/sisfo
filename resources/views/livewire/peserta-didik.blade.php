<div>
    <div class="mb-3">
        <x-primary-button wire:click='loadData'>Syncron</x-primary-button>
        <x-secondary-button wire:click='akun'>Akun</x-secondary-button>
    </div>
    @if ($tidakAkun)
    @foreach ($tidakAkun as $item)
    <li>{{ $item->nama }}</li>
    @endforeach
    @endif
    <div>
        <table class="w-full">
            <tbody>
                @foreach ($peserta_didik as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $peserta_didik->links() }}
    </div>
</div>