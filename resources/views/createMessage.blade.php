<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Mensaje</title>
</head>
<body>
    <h1>Enviar Mensaje</h1>

   
    <form action="{{route('Message.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Contenido:
        <input type="text" name="content">
        </label>
        
        <br>

        <label for="">¿Es mensaje de administrador?
        <input type="text" name="is_admin_message">
        </label>
        
        <br>

        <label for="">¿Está leído?
        <input type="text" name="is_read">
        </label>
      
        <br>

        <button type="submit">Enviar Mensaje</button>
    </form>
</body>
</html>