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
            let dateTimeString = 'Tanggal: ' + now.toLocaleDateString() + '<br>Jam: ' + now.toLocaleTimeString();
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