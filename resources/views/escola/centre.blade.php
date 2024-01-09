<h1>Benvingut admin! El teu email és {{$email}}</h1>
<h2>Llista de professors</h2>
@if(count($llistaProfessors) > 0)
    <table style="border: 1px solid black">
        <tr>
            <th>NOM</th>
            <th>COGNOM</th>
        </tr>
        @foreach ($llistaProfessors as $prof)
        <tr>
            <td>{{$prof['nom']}}</td>
            <td>{{$prof['cognoms']}}</td>
            <td><a href="{{'/prof/'.$prof['id']}}">editar</a></td>
        </tr>           
        @endforeach
        
    </table>
@else
    <h2>No hi ha professors inscrits</h2>
@endif
