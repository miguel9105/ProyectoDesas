<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('Publication.respuesta_publi')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <label for="">
        titulo
        <br>
        <input type="text" name="title">
        <br>    
    </label>
    
    <label for="">
        desccription
        <br>
        <input type="text" name="description">
        <br>
    </label>

    <label for="">
        description
        <br>
        <input type="text" name="url_img">
        <br>
    </label>
    <label for="">
        fecha publicacion
        <br>
        <input type="date" name="date_publication">
        <br>
    </label>
    <label for="">
        ubicacion
        <br>
        <input type="text" name="ubication">
        <br>
    </label>
    <br>
    <button>enviar</button>
    </form>
</body>
</html>
