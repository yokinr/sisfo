<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-3 text-center">
                        <h1 class="text-2xl font-semibold">Pembagian Tugas</h1>
                        <h2>Tahun Ajaran: {{ substr($semester,0,4) }} Semester: {{ substr($semester,4) }}</h2>
                    </div>
                    <div class="flext mb-3">
                        <select wire:model.live='semester'>
                            <option value="">Tahun Ajaran</option>
                            @foreach ($semesters as $item)
                            <option value="{{ $item->semester_id }}">{{ substr($item->semester_id,0,4) }} Semester
                                {{ substr($item->semester_id,4) }}</option>
                            @endforeach
                        </select>

                        <select wire:model.live='gtk'>
                            <option value="">GTK</option>
                            @foreach ($gtks as $item)
                            <option value="{{ $item->ptk_id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="overflow-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="border p-2">No</th>
                                    <th class="border p-2">Kode</th>
                                    <th class="border p-2">Status di Kurikulum</th>
                                    <th class="border p-2">Matpel Lokal</th>
                                    <th class="border p-2">JJM</th>
                                    <th class="border p-2">GTK</th>
                                    <th class="border p-2">Rombel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelajarans as $key => $item)
                                <tr>
                                    <td class="p-2 border">{{ $key+1 }}</td>
                                    <td class="p-2 border">{{ $item->mata_pelajaran_id }}</td>
                                    <td class="p-2 border">{{ $item->status_di_kurikulum_str }}</td>
                                    <td class="p-2 border">{{ $item->nama_mata_pelajaran }}</td>
                                    <td class="p-2 border">{{ $item->jam_mengajar_per_minggu }}</td>
                                    <td class="p-2 border">{{ $item->gtk->nama }}</td>
                                    <td class="p-2 border">{{ $item->rombel->nama }}</td>
                                </tr>
                                @php $jjm += $item->jam_mengajar_per_minggu @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-bold">
                                    <td colspan="4" class="p-2 border">Total: </td>
                                    <td class="border p-2">{{ $jjm }}</td>
                                    <td colspan="2" class="border p-2"></td>
                                </tr>
                            </tfoot>
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