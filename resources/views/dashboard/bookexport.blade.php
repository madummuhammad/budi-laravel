<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Format</th>
                    <th>Tema</th>
                    <th>Jenjang</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($books as $book)
                    @php
                        $no++;
                    @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td></td>
                        <td>{{ $book->name }}</td>
                        @foreach ($book->book_types as $book_type)
                            <td>{{ $book_type->name }}</td>
                        @endforeach
                        @foreach ($book->themes as $theme)
                            <td>{{ $theme->name }}</td>
                        @endforeach
                        @foreach ($book->levels as $level)
                            <td>{{ $level->name }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
