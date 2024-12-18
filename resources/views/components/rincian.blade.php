@extends('template.antrian')
@section('content')

<div class="relative bg-image " style="background-image: url('img/rsigm.png');">
    <div class="bg-black bg-opacity-60 w-full h-screen fixed">


        @include('components.card')

        <div class="w-[68%] container mx-auto p-2">
            <div class="pb-2 rounded shadow bg-slate-200 opacity-80">
                <table id="example" class="w-[100%] pt-[1em] pb-[1em] ">
                    <thead class="border-b border-slate-300 pb-2 text-lg font-semibold">
                        <tr>
                            <th class="py-2" style="width: 10%;">No</th>

                            <th class="py-2" style="width: 30%;">No Antrian</th>
                            <th class="py-2" style="width: 30%;">Status</th>
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
                            <td class="px-[114px]">{{ $nomorAntrian->nomor_antrian }}</td>
                            <td class="px-36">{{ $nomorAntrian->status }}</td>

                            <td class="px-20 py-2 flex gap-1">
                                <form action="{{ url('/panggil-antrian', [$nomorAntrian->kode_loket, $nomorAntrian->nomor_antrian]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="w-10 h-10 bg-emerald-700  rounded-full items-center">
                                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-mic-fill" viewBox="0 0 16 16">
                                            <path d="M5 3a3 3 0 0 1 6 0v5a3 3 0 0 1-6 0z" />
                                            <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5" />
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>
        <script>
            $(document).ready(function() {
                var audioPembuka = new Audio('/audio/pembuka.mp3');
                var audioPenutup = new Audio('/audio/penutup.mp3');

                $('button').click(function(e) {
                    e.preventDefault();
                    var url = $(this).closest('form').attr('action');

                    audioPembuka.addEventListener('ended', function() {
                        // Audio pembuka selesai diputar, jalankan audio panggilan
                        $.ajax({
                            url: url,
                            method: 'GET',
                            success: function(response) {
                                var nomorAntrian = response.nomor_antrian;
                                var kodeLoket = response.kode_loket;
                                var textToSpeak = "Nomor antrian." + nomorAntrian + "." + " Menuju ke loket 1.";
                                $('#display-antrian').text(nomorAntrian);
                                responsiveVoice.speak(textToSpeak, "Indonesian Female", {
                                    rate: 0.9,
                                    pitch: 1,
                                    volume: 1,
                                    onend: function() {
                                        // Audio panggilan selesai diputar, jalankan audio penutup
                                        audioPenutup.play();
                                    }
                                });

                                // Lakukan tindakan lain sesuai kebutuhan aplikasi

                            },
                            error: function(xhr, status, error) {
                                alert('Terjadi kesalahan: ' + error);
                            }
                        });
                    });

                    // Mulai pemutaran audio pembuka
                    audioPembuka.play();
                });
            });
            // Fungsi untuk memperbarui data antrian
            function updateQueueData() {
                $.ajax({
                    url: '/rincian', // Ganti dengan URL endpoint Anda
                    method: 'GET',
                    success: function(data) {
                        $('#jumlahAntrian').text(data.jumlahAntrian);
                        $('#antrianSekarang').text(data.antrianSekarang);
                        $('#sisaAntrian').text(data.sisaAntrian);
                        // ... Sesuaikan dengan ID elemen Anda
                    },
                    error: function(error) {
                        console.error('Gagal memperbarui data antrian:', error);
                    }
                });
            }

            // Panggil fungsi updateQueueData setiap 1 detik
            setInterval(updateQueueData, 1000);
        </script>







        @endsection