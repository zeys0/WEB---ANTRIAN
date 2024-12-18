<div class=" container w-full p-2">
    <div class="pb-2 rounded shadow bg-slate-200 opacity-80">
        <table id="example" class="w-[100%] pt-[1em] pb-[1em] ">
            <thead class="border-b border-slate-300 pb-2 text-lg font-semibold">
                <tr>
                    <th class="py-2" style="width: 10%;">No</th>

                    <th class="py-2" style="width: 30%;">No Antrian</th>
                    <th class="py-2" style="width: 10%;">Status</th>
                    <th class="py-2" style="width: 20%;">Action</th>

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
                    <td class="px-[150px]">{{ $nomorAntrian->nomor_antrian }}</td>
                    <td class="px-48">{{ $nomorAntrian->status }}</td>

                    <td class="px-40 py-2 flex gap-1">
                        <form id="form-delete-{{ $nomorAntrian->id }}" action="{{ route('hapus-antrian', ['id' => $nomorAntrian->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" rounded-full items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>

                            </button>
                        </form>




                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2 px-2">
            {{ $antrians->links() }}
        </div>
    </div>
</div>

<script>
    function deleteAntrian(id) {
        if (confirm('Anda yakin ingin menghapus antrian ini?')) {
            // Lakukan permintaan AJAX untuk menghapus antrian
            axios.delete(`/hapus-antrian/${id}`)
                .then(function(response) {
                    // Tindakan setelah penghapusan berhasil
                    console.log(response.data); // atau tampilkan pesan sukses
                    // Misalnya, Anda bisa melakukan penyesuaian pada DOM jika diperlukan.
                    // Contoh: hapus baris dari tabel tanpa reload
                    document.getElementById(`form-delete-${id}`).parentNode.remove();
                })
                .catch(function(error) {
                    // Tangani kesalahan jika penghapusan gagal
                    console.error(error);
                    alert('Gagal menghapus antrian.');
                });
        }
    }
</script>