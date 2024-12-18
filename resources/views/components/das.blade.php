<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


</head>

<body class="flex bg-gray-100 min-h-screen">
    @include('componentsDas.sideMenu')

    <div class="flex-grow text-gray-800">

        <main class="p-6 sm:p-10 space-y-6">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                <div class="mr-6">
                    <h1 class="text-4xl font-semibold mb-2">Dashboard</h1>

                </div>
                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <button class="inline-flex px-5 py-3 text-emerald-600 hover:text-emerald-700 focus:text-emerald-700 hover:bg-emerald-100 focus:bg-emerald-100 border border-emerald-600 rounded-md mb-3">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Manage dashboard
                    </button>
                    <form action="{{ route('reset.data') }}" method="post">
                        @csrf
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin mereset data antrian?')" class="inline-flex px-5 py-3 text-white bg-emerald-600 hover:bg-emerald-700 focus:bg-emerald-700 rounded-md ml-6 mb-3">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                            </svg>
                            Reset antrian
                        </button>
                    </form>
                </div>
            </div>
            <section class="flex gap-2  ">
                <div class="flex items-center p-8 bg-white shadow rounded-lg w-1/2 ">
                    <div class=" inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">{{$jumlahAntrian}}</span>
                        <span class="block text-gray-500">Antrians</span>
                    </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow rounded-lg w-1/2">
                    <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                        </svg>
                    </div>
                    <div>
                        <span class="inline-block text-2xl font-bold">{{$sisaAntrian}}</span>
                        <span class="inline-block text-xl text-gray-500 font-semibold"></span>
                        <span class="block text-gray-500">Sisa Antrian</span>
                    </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow rounded-lg w-1/2">
                    <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">{{$antrianSekarang}}</span>
                        <span class="block text-gray-500">Finished</span>
                    </div>
                </div>

            </section>

            <section class="">
                <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                    @include('components.tableDelete')
                </div>




            </section>

        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        function deleteAntrian(id) {
            if (confirm('Anda yakin ingin menghapus antrian ini?')) {
                // Menggunakan jQuery untuk permintaan DELETE dengan Ajax
                $.ajax({
                    url: `/hapus-antrian/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menggunakan SweetAlert untuk menampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Antrian berhasil dihapus.',
                        });
                        // Menghapus baris dari tabel tanpa reload
                        $(`#form-delete-${id}`).closest('tr').remove();
                    },
                    error: function(error) {
                        // Menampilkan alert untuk kesalahan
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menghapus antrian.',
                        });
                        console.error(error);
                    }
                });
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function deleteAntrian(id) {
            if (confirm('Anda yakin ingin menghapus antrian ini?')) {
                // Menggunakan jQuery untuk permintaan DELETE dengan Ajax
                $.ajax({
                    url: `/admin`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Menggunakan SweetAlert untuk menampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Antrian berhasil dihapus.',
                        }).then((result) => {
                            // Hapus baris dari tabel tanpa reload
                            $(`#form-delete-${id}`).closest('tr').remove();
                        });
                    },
                    error: function(error) {
                        // Menampilkan alert untuk kesalahan
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Gagal menghapus antrian.',
                        });
                        console.error(error);
                    }
                });
            }
        }
    </script>


</body>