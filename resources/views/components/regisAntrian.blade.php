@extends('template.regis')
@section('content')

<div class=" bg-image " style="background-image: url('img/rsigm.png');">
    <div class="bg-black bg-opacity-60 w-full h-screen fixed">
        <div class="container  inset-0 flex flex-col items-center gap-2 justify-center my-56">
            <p id="pesan" class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
            <div>
                <h1 class=" border-slate-300 font-extrabold text-4xl -translate-y-5 text-slate-100 tracking-widest">DAFTAR ANTRIAN</h1>

            </div>
            <div class="relative flex flex-col text-slate-900 bg-slate-200 shadow-md w-96 rounded-xl ">
                <div class="p-6 flex">
                    <div class="flex flex-col">

                        <h5 class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            Daftar Antrian
                        </h5>
                        <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                            Antrian Untuk Loket A
                        </p>
                    </div>
                    <div class="translate-x-11">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="84px" height="84px">
                            <path d="M 6.0097656 2 C 4.9143111 2 4.0097656 2.9025988 4.0097656 3.9980469 L 4 22 L 12 19 L 20 22 L 20 20.556641 L 20 4 C 20 2.9069372 19.093063 2 18 2 L 6.0097656 2 z M 6.0097656 4 L 18 4 L 18 19.113281 L 12 16.863281 L 6.0019531 19.113281 L 6.0097656 4 z" />
                        </svg>
                    </div>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('tambah.antrian') }}">


                        <button id="tambahAntrianButton" type="submit" class="tracking-wider w-full select-none rounded-b-lg bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-fuchsi-500/20 transition-all hover:shadow-lg hover:opacity-80 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" data-ripple-light="true">
                            @csrf
                            Print
                        </button>
                    </form>

                </div>
            </div>



        </div>
    </div>
</div>


</p>
<script>
    document.getElementById('tambahAntrianButton').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan perilaku asli formulir

        fetch('/daftarantrian', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                // Membuka window baru untuk preview dan cetak
                let previewWindow = window.open('', '_blank');
                previewWindow.document.write('<html><head><title>Karcis Antrian</title>');
                previewWindow.document.write('<style>');
                previewWindow.document.write('body { text-align: center; }');
                previewWindow.document.write('.ticket { border: 2px dashed #000; padding: 20px; width: 300px; margin: 20px auto; }');
                previewWindow.document.write('.ticket h2, .ticket p { margin: 10px 0; }');
                previewWindow.document.write('.logo { max-width: 100px; margin-bottom: 10px; }');
                previewWindow.document.write('</style>');
                previewWindow.document.write('</head><body>');

                // Menambahkan kelas "ticket" untuk styling
                previewWindow.document.write('<div class="ticket">');

                // Menampilkan logo
                previewWindow.document.write('<img class="logo" src="/img/logo.png" alt="Logo" />');

                // Menampilkan nomor antrian
                previewWindow.document.write('<h2>Nomor Antrian Anda</h2>');
                previewWindow.document.write('<p style="font-size: 24px; font-weight: bold;">' + data.nomor_antrian + '</p>');

                // Menampilkan detail kode loket
                previewWindow.document.write('<p>Kode Loket: ' + data.kode_loket + '</p>');

                // Menampilkan tanggal dan jam
                let now = new Date();
                let dateTimeString = 'Tanggal: ' + now.toLocaleDateString() + ' ' + now.toLocaleTimeString();
                previewWindow.document.write('<p>' + dateTimeString + '</p>');


                previewWindow.document.write('<p>Silakan menunggu hingga nomor antrian Anda dipanggil.</p>');

                // Menutup div "ticket"
                previewWindow.document.write('</div>');

                previewWindow.document.write('</body></html>');
                // Menampilkan tombol cetak
                previewWindow.document.write('<button onclick="window.print()">Cetak Karcis</button>');
                previewWindow.document.close();
            })
            .catch(error => {
                // Tangani kesalahan jika diperlukan
            });
    });
</script>

<!-- <script>
    Print default
    document.getElementById('tambahAntrianButton').addEventListener('click', function(event) {
        event.preventDefault();


        fetch('/daftarantrian', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {

                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message,
                });
            })

            .catch(error => {

            });
    });
</script> -->


@endsection