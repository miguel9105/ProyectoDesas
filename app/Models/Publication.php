<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PublicationController;

class Publication extends Model
{
    use HasFactory;

    // este array define que campos pueden ser asignados masivamente
    protected $fillable = [
        'title',
        'type',
        'severity',
        'location',
        'description',
        'image',
        'role_id'
    ];

    // tipos de desastre, bien definido en un array constante
    public const TYPES = [
        'inundacion' => 'Inundación',
        'incendio' => 'Incendio',
        'terremoto' => 'Terremoto',
        'deslizamiento' => 'Deslizamiento',
        'otro' => 'Otro'
    ];

    // niveles de severidad en un array constante
    public const SEVERITY_LEVELS = [
        'alta' => 'Alta',
        'media' => 'Media',
        'baja' => 'Baja'
    ];

    // accesor que te da la url completa de la imagen
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : asset('images/default-publication.jpg');
    }

    // devuelve el tipo de desastre de forma legible
    public function getFormattedTypeAttribute()
    {
        return self::TYPES[$this->type] ?? $this->type;
    }

    // devuelve la severidad de forma legible
    public function getFormattedSeverityAttribute()
    {
        return self::SEVERITY_LEVELS[$this->severity] ?? $this->severity;
    }

    // devuelve la fecha de creacion en formato 'd M Y'
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function category() {
        return $this->belongsToMany('App\Models\Category');
    }

    public function rol() {
        return $this->belongsTo('App\Models\Role');
    }

    public function notification() {
        return $this->belongsToMany('App\Models\Notification');
    }
}

