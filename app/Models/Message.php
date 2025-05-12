<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;



use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     use HasFactory;
 // Definimos los atributos que pueden ser asignados masivamente (para evitar asignaciones masivas no deseadas)
    protected $fillable = [
        'content',  // Contenido del mensaje
        'is_admin_message',// Indica si el mensaje es del administrador (booleano)
        'is_read',  // Indica si el mensaje ha sido leído (booleano)
        'user_id', // ID del usuario que envía el mensaje
        'role_id', // ID del rol del usuario que envía el mensaje
    ];
// Relación uno a muchos inversa con el modelo User
    // Esto significa que cada mensaje pertenece a un usuario
    public function user()
    {
         // Define la relación de pertenencia entre el mensaje y el usuario
        return $this->belongsTo(User::class);
    }

     // Relación uno a muchos inversa con el modelo Role
    // Esto significa que cada mensaje tiene un rol asociado (como administrador o usuario)
    public function role()
    {
         // Define la relación de pertenencia entre el mensaje y el rol
        return $this->belongsTo(Role::class);
    }
    
}

   


