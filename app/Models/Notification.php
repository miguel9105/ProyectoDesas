<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // una notificacion pertenece a una publicacion
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
