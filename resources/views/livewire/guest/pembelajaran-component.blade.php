<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center">
                        <h1 class="font-semibold text-2xl mb-3">Pembelajaran</h1>
                        <h2>Tahun: {{ substr($semester_id,0,4) }} Semester: {{ substr($semester_id,4) }}</h2>
                    </div>
                    <div class="flex mb-3">
                        <div class="flex-auto flex">
                            <div>
                                <select name="semesters" id="semesters" wire:model.live='semester_id'>
                                    <option value="">Semester</option>
                                    @foreach ($semesters as $item)
                                    <option value="{{ $item->semester_id }}">{{ $item->semester_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <select name="jenis_rombels" id="jenis_rombels" wire:model.live='jenis_rombel'>
                                    <option value="">Jenis Rombel</option>
                                    @foreach ($jenis_rombels as $item)
                                    <option value="{{ $item->jenis_rombel }}">{{ $item->jenis_rombel_str }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mx-1">
                                <select name="rombels" id="rombels" wire:model.live='rombel'>
                                    <option value="">Rombel</option>
                                    @foreach ($rombels as $item)
                                    <option value="{{ $item->rombongan_belajar_id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <input type="text" wire:model.live='search' placeholder="Search ...">
                        </div>
                    </div>
                    <div class="overflow-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Matpel</th>
                                    <th>Nama Matpel</th>
                                    <th>GTK</th>
                                    <th>JJM</th>
                                    <th>Status Kurikulum</th>
                                    {{-- <th>Rombel</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelajarans as $key => $item)
                                <tr>
                                    <td class="p-1 border">{{ $key+1 }}</td>
                                    <td class="p-1 border">{{ $item->mata_pelajaran_id }}</td>
                                    {{-- <td class="p-1 border">{{ $item->mata_pelajaran_id_str }}</td> --}}
                                    <td class="p-1 border">{{ $item->nama_mata_pelajaran }}</td>
                                    <td class="p-1 border"><a wire:navigate
                                            href="{{ route('guest.pembelajaran.gtk', [$item->ptk_id,$semester_id]) }}"
                                            class="text-blue-600 underline">{{
                                            $item->gtk->nama }}</a></td>
                                    <td class="p-1 border">{{ $item->jam_mengajar_per_minggu }}</td>
                                    <td class="p-1 border">{{ $item->status_di_kurikulum_str }}</td>
                                    {{-- <td class="p-1 border">{{ $item->rombel->nama }}</td> --}}
                                </tr>
                                @php $JJM += $item->jam_mengajar_per_minggu @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-bold">
                                    <td colspan="4" class="p-2 border">Total</td>
                                    <td class="p-2 border">{{ $JJM }}</td>
                                    <td colspan="2" class="p-2 border"></td>
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