<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Benvingut admin! El teu email és {{$email}}</h1>
<h2>Llista de professors</h2>
<a href="/prof/crear"> Crear </a>   
<br>
<br>
@if(count($llistaProfessors) > 0)
    <table>
        <tr>
            <th>NOM</th>
            <th>COGNOM</th>
            <th>CORREU</th>
            <th>ACTIU</th>
        </tr>
        @foreach ($llistaProfessors as $prof)
        <tr>
            <td>{{$prof['nom']}}</td>
            <td>{{$prof['cognoms']}}</td>
            <td>{{$prof['email']}}</td>
            <td>{{$prof['actiu']}}</td>
            <td><a href="{{'/prof/'.$prof['id']}}">Editar</a></td>
            <td><a href="{{'/prof/'.$prof['id']}}">Borrar</a></td>
        </tr>           
        @endforeach
        
    </table>
@else
    <h2>No hi ha professors inscrits</h2>
@endif
</body>
</html>



