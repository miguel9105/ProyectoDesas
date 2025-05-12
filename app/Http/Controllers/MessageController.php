<?php

// Declaramos el namespace donde se encuentra el controlador (en este caso, dentro de la carpeta App\Http\Controllers)
namespace App\Http\Controllers;

// Importamos el modelo Message para interactuar con los mensajes en la base de datos
use App\Models\Message;
// Importamos la clase Request para manejar las solicitudes HTTP
use Illuminate\Http\Request;
// Importamos Auth para manejar la autenticación del usuario
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    // Método para mostrar los mensajes ordenados
    public function enviar()
    {
        // Obtenemos todos los mensajes, ordenados por fecha de creación (de más antiguo a más reciente)
        $messages = Message::orderBy('created_at', 'asc')->get();
        // Retornamos la vista 'createMessage', pasando los mensajes obtenidos como variable
        return view('createMessage', compact('messages'));
    }

    // Método para guardar un nuevo mensaje
    public function store(Request $request)
    {
        // Validamos que el campo 'content' sea obligatorio y sea una cadena de texto
        $request->validate([
            'content' => 'required|string',
        ]);
        
        // Creamos una nueva instancia del modelo Message para guardar el nuevo mensaje
        $message = new Message();
        // Asignamos el contenido del mensaje que llega a través de la solicitud
        $message->content = $request->content;
        // Marcamos el mensaje como no leído (por defecto)
        $message->is_read = false;

        // Obtenemos el usuario autenticado
        $user = Auth::user();
        
        // Verificamos si el usuario está autenticado y si su rol es de administrador (suponiendo que el role_id 1 corresponde a administrador)
        $message->is_admin_message = ($user && $user->role_id == 1) ? true : true;
        
        // Asignamos el ID del usuario si está autenticado, o null si no lo está
        $message->user_id = $user ? $user->id : null;

        // Asignamos el role_id del usuario, o 2 si el usuario no está autenticado (suponiendo que 2 es otro rol)
        $message->role_id = $user ? $user->role_id : 1;

        // Guardamos el nuevo mensaje en la base de datos
        $message->save();

        // Redirigimos al usuario de vuelta con un mensaje de éxito
        return redirect()->back()->with('success', 'Mensaje enviado con éxito.');
}
}