<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('User.enviarUsuario')}} " method="post" enctype="multipart/form-data">
        @csrf   
        <label for="">
            ingresa tu nombre
            <br>
            <input type="text" name="name">
            <br>
        </label>
        <label for="">
            ingresa tu correo
            <br>
            <input type="text" name="email">
            <br>
        </label><label for="">
            ingresa tu contraseña
            <br>
            <input type="text" name="password">
            <br>
        </label>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>