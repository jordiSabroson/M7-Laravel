<h1>Benvingut alumne!</h1>
<form action="/prof/pujar" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="document">
    <button type="submit">Pujar document</button>
</form>
<a href="/signin">Desconnectar-se</a>