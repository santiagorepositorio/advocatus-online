<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lista de Contactos</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    header img {
        width: 100px;
        height: auto;
    }

    header h1 {
        margin-top: 10px;
    }

    header span {
        color: #ffd700;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: separate;
        border-spacing: 0;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f2f2f2;
    }

</style>
</head>
<body>

<header>

    <h1>Lista de Contactos del Curso: <br><span>{{ $course->title }}</span></h1>
</header>

<main>
    <table>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Estado</th>
        </tr>
        @foreach ($users as $key => $user)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                @if ($user->statusr == 1)
                    PRE INSCRITO
                @elseif ($user->statusr == 2)
                    INSCRITO
                @elseif ($user->statusr == 3)
                    CERTIFICADO
                @else
                    Otro estado
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</main>

</body>
</html>

