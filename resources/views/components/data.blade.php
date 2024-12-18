<div class=" container w-full p-2">
    <div class="pb-2 rounded shadow bg-slate-200 opacity-80">
        <table id="example" class="w-[100%] pt-[1em] pb-[1em] ">
            <thead class="border-b border-slate-300 pb-2 text-lg font-semibold">
                <tr>
                    <th class="py-2" style="width: 10%;">No</th>

                    <th class="py-2" style="width: 30%;">No Antrian</th>
                    <th class="py-2" style="width: 10%;">Kode</th>
                    <th class="py-2" style="width: 20%;">created_at</th>
                    <th class="py-2" style="width: 20%;">updated_at</th>
                    <th class="py-2" style="width: 20%;">status</th>

                </tr>
            </thead>
            <tbody class="text-base">
                @php
                // Hitung nomor awal pada halaman baru
                $startingNumber = ($antrians->currentPage() - 1) * $antrians->perPage() + 1;
                @endphp
                @foreach($antrians as $index => $nomorAntrian)
                <tr class="hover:bg-slate-300">
                    <td class="px-16 py-4">{{ $startingNumber + $index }}</td>
                    <td class="px-40 py-4">{{ $nomorAntrian->nomor_antrian }}</td>
                    <td class="px-16 py-4">{{ $nomorAntrian->kode_loket }}</td>
                    <td class="px-16 py-4">{{ $nomorAntrian->created_at }}</td>
                    <td class="px-16 py-4">{{ $nomorAntrian->updated_at }}</td>
                    <td class="px-16 py-4">{{ $nomorAntrian->status }}</td>



                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2 px-2">
            {{ $antrians->links() }}
        </div>
    </div>
</div>