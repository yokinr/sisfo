<div>
    @include('livewire.guest.top-nav')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="text-center mb-3">
                        <h1 class="text-2xl font-bold">Pembelajaran</h1>
                        <h2 class="text-lg">{{ $gtk->nama }}</h2>
                        <h3>Tahun: {{ substr($semester_id,0,4) }} Semester: {{ substr($semester_id,4) }}</h3>
                    </div>
                    <div class="overflow-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-4 border">No</th>
                                    <th class="p-4 border">Kode Matpel</th>
                                    <th class="p-4 border">Nama Matpel</th>
                                    <th class="p-4 border">Rombel</th>
                                    <th class="p-4 border">JJM</th>
                                    <th class="p-4 border">Status Kurikulum</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembelajarans as $key => $item)
                                <tr>
                                    <td class="p-2 border">{{ $key+1 }}</td>
                                    <td class="p-2 border">{{ $item->mata_pelajaran_id }}</td>
                                    <td class="p-2 border">{{ $item->nama_mata_pelajaran }}</td>
                                    <td class="p-2 border">{{ $item->rombel->nama }}</td>
                                    <td class="p-2 border">{{ $item->jam_mengajar_per_minggu }}</td>
                                    <td class="p-2 border">{{ $item->status_di_kurikulum_str }}</td>
                                </tr>
                                @php $jjm += $item->jam_mengajar_per_minggu @endphp
                                @empty

                                @endforelse
                                <tr class="font-semibold">
                                    <td class="p-2 border" colspan="4">Total</td>
                                    <td class="p-2 border">{{ $jjm }}</td>
                                    <td class="border p-2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-3">
                        {{ $pembelajarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>