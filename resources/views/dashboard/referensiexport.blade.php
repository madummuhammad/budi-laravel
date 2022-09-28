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
                    <th>Judul</th>
                    <th>Format</th>
                    <th>Tema</th>
                    <th>Jenjang</th>
                    <th>Unduh</th>
                    <th>Like</th>
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
                        <td>{{ $book->name }}</td>
                        @foreach ($book->reference_book_types as $book_type)
                            <td>{{ $book_type->name }}</td>
                        @endforeach
                        @foreach ($book->reference_themes as $theme)
                            <td>{{ $theme->name }}</td>
                        @endforeach
                        @foreach ($book->levels as $level)
                            <td>{{ $level->name }}</td>
                        @endforeach
                        <td>{{ $book->reference_book_downloads->count() }}</td>
                        <td>{{ $book->reference_book_likeds->count() }}</td>
                        <td>{{ $book->reference_comments->count() }}</td>
                        @if ($book->reference_comments->count() == 0)
                            <td>0</td>
                        @else
                            <td>{{ number_format($book->reference_comments->sum('star') / $book->reference_comments->count(), 1) }}
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
