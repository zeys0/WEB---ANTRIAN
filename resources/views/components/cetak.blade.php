<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="font-bold text-xl text-center py-5">
        <h1 class="">LAPORAN DATA ANTRIAN</h1>
    </div>

    <table class="border border-black table-auto mx-auto">
        <tr class="border border-black">
            <th class="border-r border-black px-4 py-2">No</th>
            <th class="border-r border-black px-4 py-2">No Antrian</th>
            <th class="border-r border-black px-4 py-2">Kode</th>
            <th class="border-r border-black px-4 py-2">created_at</th>
            <th class="border-r border-black px-4 py-2">updated_at</th>
            <th class="border-r border-black px-4 py-2">status</th>
        </tr>

        @foreach($antrians as $index => $nomorAntrian)
        <tr class="border border-black">
            <td class="border-r border-black px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border-r border-black px-4 py-2">{{ $nomorAntrian->nomor_antrian }}</td>
            <td class="border-r border-black px-4 py-2">{{ $nomorAntrian->kode_loket }}</td>
            <td class="border-r border-black px-4 py-2">{{ $nomorAntrian->created_at }}</td>
            <td class="border-r border-black px-4 py-2">{{ $nomorAntrian->updated_at }}</td>
            <td class="border-r border-black px-4 py-2">{{ $nomorAntrian->status }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>