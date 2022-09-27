<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visitor</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Profesi</th>
                    <th>Jenjang</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($visitors as $visitor)
                    @php
                        $no++;
                    @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->username }}</td>
                        <td>{{ $visitor->email }}</td>
                        <td>{{ $visitor->phone }}</td>
                        <td>{{ $visitor->city }}</td>
                        <td>{{ $visitor->sub }}</td>
                        <td>{{ $visitor->area }}</td>
                        <td>{{ $visitor->profession }}</td>
                        <td>{{ $visitor->level }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
