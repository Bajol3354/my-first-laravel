<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <table border="1px">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Score</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>
                    <a href="{{ route('show', $student->id) }}">{{ $student->name }}</a>
                </td>
                <td>{{ $student->score }}</td>
                <td>
                    <form action="{{ route('edit', $student) }}" method="get">
                        @csrf <!-- Untuk Keamanan Data -->
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('delete', $student) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <table border="2px">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Score</th>
        </tr>
        @foreach ($data as $student)
            <tr>
                <td>{{ ($data->currentpage()-1) * $data ->perpage() + $loop->index + 1 }}</td> <!-- page saat ini dikurangi 1 (0), kemudian di kali perpage (1), lalu ditambah 1 dari index page sebelumnya (0*1=0, lalu 0+1 = 1) -->
                <td>
                    <a href="{{ route('show', $student->id) }}">{{ $student->name }}</a>
                </td>
                <td>{{ $student->score }}</td>
            </tr>
        @endforeach
    </table>

    Current Page: {{ $data->currentPage() }} <br>
    Total Data: {{ $data->total() }} <br>
    Data per page: {{ $data->perPage() }} <br>

    {{ $data->links('pagination::bootstrap-4') }}
</body>
</html>