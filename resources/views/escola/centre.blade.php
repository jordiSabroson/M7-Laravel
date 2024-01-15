<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Benvingut admin! El teu email és {{ $email }}</h1>
    <a href="/prof/crear"> Crear un nou usuari</a>
    <h2>Llista de professors</h2>
    @if (count($llistaProfessors) > 0)
        <table>
            <tr>
                <th>NOM</th>
                <th>COGNOM</th>
                <th>CORREU</th>
                <th>ACTIU</th>
            </tr>
            @foreach ($llistaProfessors as $prof)
                <tr>
                    <td>{{ $prof['nom'] }}</td>
                    <td>{{ $prof['cognoms'] }}</td>
                    <td>{{ $prof['email'] }}</td>
                    <td>{{ $prof['actiu'] }}</td>
                    <td><a href="{{ '/prof/edit/' . $prof['id'] }}">Editar</a></td>
                    <td><a href="{{ '/prof/edit/' . $prof['id'] }}">Borrar</a></td>
                </tr>
            @endforeach

        </table>
    @else
        <h2>No hi ha professors inscrits</h2>
    @endif
    <br>
    <h2>Llista d'alumnes</h2>
    @if (count($llistaAlumnes) > 0)
        <table>
            <tr>
                <th>NOM</th>
                <th>COGNOM</th>
                <th>CORREU</th>
                <th>ACTIU</th>
            </tr>
            @foreach ($llistaAlumnes as $alum)
                <tr>
                    <td>{{ $alum['nom'] }}</td>
                    <td>{{ $alum['cognoms'] }}</td>
                    <td>{{ $alum['email'] }}</td>
                    <td>{{ $alum['actiu'] }}</td>
                    <td><a href="{{ '/prof/edit/' . $alum['id'] }}">Editar</a></td>
                    <td><a href="{{ '/prof/delete/' . $alum['id'] }}">Borrar</a></td>
                </tr>
            @endforeach
        </table>
    @else
        <h2>No hi ha alumnes inscrits</h2>
    @endif
</body>

</html>
