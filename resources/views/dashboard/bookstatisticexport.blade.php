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
                    <th>Baca</th>
                    <th>Unduh</th>
                    <th>Like</th>
                    <th>Share</th>
                    <th>Simpan</th>
                    <th>Komentar</th>
                    <th>Ratting</th>
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
                        <td>{{ $book->book_read_statistics->count() }}</td>
                        <td>{{ $book->book_download_statistics->count() }}</td>
                        <td>{{ $book->mylibraries->where('liked', 1)->count() }}</td>
                        <td>{{ $book->shares->count() }}</td>
                        <td>{{ $book->mylibraries->where('saved', 1)->count() }}</td>
                        <td>{{ $book->comments->count() }}</td>
                        @if ($book->comments->count() == 0)
                            <td>0</td>
                        @else
                            <td>{{ number_format($book->comments->sum('star') / $book->comments->count(), 1) }}
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
