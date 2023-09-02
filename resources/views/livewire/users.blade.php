<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3 text-right">
                        <x-primary-button wire:click='loadData'>Syncron</x-primary-button>
                    </div>
                    <div class="overflow-auto">
                        <table class="w-full">
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td class="border p-1">{{ $item->name }}</td>
                                    <td class="border p-1">{{ $item->email }}</td>
                                    <td class="border p-1">{{ $item->peran_id_str }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>