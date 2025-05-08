<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Rol</title>
</head>
<body>
    <h2>Crear nuevo Rol</h2>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div>
            <label for="administrators">Administrador*</label>
            <input type="text" name="administrators" id="administrators" required>
        </div>

        <div>
            <label for="community">Comunidad*</label>
            <input type="text" name="community" id="community" required>
        </div>

        <div>
            <label for="zone_community">Zona de la Comunidad*</label>
            <input type="text" name="zone_community" id="zone_community" required>
        </div>

        <div>
            <label for="mail_administrator">Correo del Administrador*</label>
            <input type="email" name="mail_administrator" id="mail_administrator" required>
        </div>

        <button type="submit">Crear Rol</button>
        <a href="{{ url()->previous() }}">Cancelar</a>
    </form>
</body>
</html>