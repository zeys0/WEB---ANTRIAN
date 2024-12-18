@extends('template.main')
@section('content')
<div class="pt-4 bg-slate-200">
    <div class="container">
        <div class="flex gap-2">
            <!-- Bagian nomor antrian -->
            <div class="w-[40%] h-75 border border-fuchsia-700 bg bg-slate-300 rounded-md">
                <div class="flex flex-col items-center py-10">
                    <h1 class="text-slate-800 text-3xl font-lg">Nomor Antrian</h1>
                    <div class="border border-slate-800 w-[90%] mt-5"></div>
                    <!-- Tampilkan nomor antrian yang dipanggil di sini -->
                    <h2 id="display-antrian" class="text-slate-800 text-3xl font-semibold mt-10">
                        <!-- Nomor antrian akan ditampilkan di sini -->
                    </h2>
                    <div class="border border-slate-800 w-[90%] mt-5"></div>
                    <h2 class="text-slate-800 text-3xl font-semibold mt-4">Loket : 1</h2>
                </div>
            </div>

            <!-- Bagian Video -->
            <div class="w-[60%] h-75 bg-slate-300 shadow-lg rounded-md">
                <div class="flex justify-center p-5">
                    <iframe width="800" height="315" src="https://www.youtube.com/embed/LZkX20LFxQM" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="/js/app.js"></script>



<!-- Script untuk mendengarkan event dari WebSocket -->

@endsection