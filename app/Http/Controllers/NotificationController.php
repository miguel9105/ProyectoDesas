<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Muestra el formulario para crear una notificación
    public function vista_notificacion()
    {
        return view('frm_notifications');
    }

    // Procesa y guarda la notificación enviada desde el formulario
    public function respuesta_notificacion(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:terremoto,inundacion,incendio,tormenta,otro',
            'description' => 'required|string',
            'event_notification' => 'nullable|string',
            'publication_id' => 'nullable|integer',
        ]);

        // Crear y guardar la nueva notificación
        $notificacion = new Notification();
        $notificacion->title = $request->title;
        $notificacion->type = $request->type;
        $notificacion->description = $request->description;
        $notificacion->event_notification = $request->event_notification ?? null;
        $notificacion->publication_id = $request->publication_id ?? null;
        $notificacion->save();

        // Puedes redirigir o devolver la notificación guardada
        return redirect()->route('notificacion.formulario')->with('success', 'Notificación guardada correctamente.');
    }
}
