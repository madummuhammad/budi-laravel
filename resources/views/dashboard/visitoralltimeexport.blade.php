<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table class="display table-table" style="min-width: 845px">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Device</th>
                <th>Browser</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($visitors as $visitor_visit)
                @php
                    $no++;
                @endphp
                <tr>
                    <td>{{ $no }}</td>
                    @if ($visitor_visit->visitors !== null)
                        <td>{{ $visitor_visit->visitors->name }}</td>
                    @else
                        <td>Unknown</td>
                    @endif
                    <td>{{ $visitor_visit->visitors->city }},
                        {{ $visitor_visit->visitors->sub }},
                        {{ $visitor_visit->visitors->area }}</td>
                    <td>{{ $visitor_visit->device }}</td>
                    <td>{{ $visitor_visit->browser }}</td>
                    <td>{{ date('Y-m-d H:i:s', $visitor_visit->time) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
