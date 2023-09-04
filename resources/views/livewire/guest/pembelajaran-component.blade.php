<div>
    @include('livewire.guest.top-nav')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center">
                        <h1 class="font-semibold text-2xl mb-3">Pembelajaran</h1>
                        @if ($semester_id)
                        <h2>Tahun: {{ substr($semester_id,0,4) }} Semester: {{ substr($semester_id,4) }}</h2>
                        @else
                        <span></span>
                        @endif
                    </div>
                    <div class="flex flex-wrap mb-3">
                        <div class="mr-1">
                            <select name="semesters" id="semesters" wire:model.live='semester_id'>
                                <option value="">Semester</option>
                                @foreach ($semesters as $item)
                                <option value="{{ $item->semester_id }}">{{ $item->semester_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-1">
                            <select name="jenis_rombels" id="jenis_rombels" wire:model.live='jenis_rombel'>
                                <option value="">Jenis Rombel</option>
                                @foreach ($jenis_rombels as $item)
                                <option value="{{ $item->jenis_rombel }}">{{ $item->jenis_rombel_str }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-1">
                            <select name="rombels" id="rombels" wire:model.live='rombel'>
                                <option value="">Rombel</option>
                                @foreach ($rombels as $item)
                                <option value="{{ $item->rombongan_belajar_id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="overflow-auto">
                        @if (count($pembelajarans)>>0)
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-2 border">No</th>
                                    <th class="p-2 border">Kode Matpel</th>
                                    <th class="p-2 border">Nama Matpel</th>
                                    <th class="p-2 border">GTK</th>
                                    <th class="p-2 border">JJM</th>
                                    <th class="p-2 border">Status Kurikulum</th>
                                    {{-- <th class="p-2 border">Rombel</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembelajarans as $key => $item)
                                <tr>
                                    <td class="p-1 border">{{ $key+1 }}</td>
                                    <td class="p-1 border">{{ $item->mata_pelajaran_id }}</td>
                                    {{-- <td class="p-1 border">{{ $item->mata_pelajaran_id_str }}</td> --}}
                                    <td class="p-1 border">{{ $item->nama_mata_pelajaran }}</td>
                                    <td class="p-1 border">
                                        <a wire:navigate
                                            href="{{ route('guest.pembelajaran.gtk', [$item->ptk_id,$semester_id]) }}"
                                            class="text-blue-600">{{
                                            $item->gtk->nama }}</a>
                                    </td>
                                    <td class="p-1 border">{{ $item->jam_mengajar_per_minggu }}</td>
                                    <td class="p-1 border">{{ $item->status_di_kurikulum_str }}</td>
                                    {{-- <td class="p-1 border">{{ $item->rombel->nama }}</td> --}}
                                </tr>
                                @php $JJM += $item->jam_mengajar_per_minggu @endphp
                                @empty
                                <tr>
                                    <td class="p-5 border text-center" colspan="6">0 Results</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="font-bold">
                                    <td colspan="4" class="p-2 border">Total</td>
                                    <td class="p-2 border">{{ $JJM }}</td>
                                    <td colspan="2" class="p-2 border"></td>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                        <div class="p-8 border rounded text-center">
                            0 Results
                        </div>
                        @endif
                    </div>
                    <div class="my-3">
                        {{ $pembelajarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>