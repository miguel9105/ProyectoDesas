<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Emergencia</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('resources/css/StyleNotifications.css') }}">
</head>
<body class="bg-light py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('notificacion.respuesta_notificacion') }}" method="POST" class="card shadow-sm p-4">
                    @csrf
                    
                    <h2 class="mb-4 text-center">Reporte de Emergencia</h2>
                    
                    <!-- Campo título -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título de la notificación:</label>
                        <input type="text" name="title" id="titulo" class="form-control" required placeholder="Ej: Alerta por terremoto">
                    </div>
        
                    <!-- Campo tipo de desastre -->
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo de desastre:</label>
                        <select name="type" id="tipo" class="form-select" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="terremoto">Terremoto</option>
                            <option value="inundacion">Inundación</option>
                            <option value="incendio">Incendio</option>
                            <option value="tormenta">Tormenta</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
        
                    <!-- Campo descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción del evento:</label>
                        <textarea name="description" id="descripcion" rows="4" class="form-control" required placeholder="Describa los detalles de la emergencia..."></textarea>
                    </div>
        
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Enviar notificación</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, solo si usas componentes JS de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
