<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{

    public function index(Request $request)
    {
        // crea una consulta base desde el modelo publication
        $query = Publication::query();

        // si el request trae el filtro type, lo agrega a la consulta
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // si se especifica una location, busca coincidencias parciales
        if ($request->filled('location')) {
            $query->where('location', 'like', '%'.$request->location.'%');
        }

        // filtra por severidad si viene en el request
        if ($request->filled('severity')) {
            $query->where('severity', $request->severity);
        }

        // si hay un texto para buscar filtra por coincidencias en titulo o descripcion
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('description', 'like', '%'.$request->search.'%');
            });
        }

        // ordena segun lo que venga en el request o por defecto de forma descendente por fecha
        switch ($request->get('sort', 'date_desc')) {
            case 'date_asc': 
                $query->oldest(); 
                break;
            case 'severity_desc': 
                $query->orderBy('severity', 'desc'); 
                break;
            default: 
                $query->latest(); 
                break;
        }

        // ejecuta la consulta paginando los resultados y manteniendo los filtros en la url
        $publications = $query->paginate(12)->appends($request->query());

        // retorna la vista con los resultados obtenidos
        return view('publication', compact('publications'));
    }

    public function store(Request $request)
    {
        // valida los datos del formulario segun las reglas definidas
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:inundacion,incendio,terremoto,deslizamiento,otro',
            'severity' => 'required|in:alta,media,baja',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // si se subio una imagen, la guarda en el disco y guarda la ruta
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('publications', 'public');
        }

        // crea una nueva publicacion en la base de datos con los datos validados
        Publication::create($validated);

        // redirige al index con un mensaje de exito
        return redirect()->route('publications.index')
            ->with('success', 'Publicación creada exitosamente.');
    }

    public function show(Publication $publication)
    {
        // devuelve la publicacion solicitada en formato json
        return response()->json($publication);
    }

    public function destroy(Publication $publication)
    {
        // si la publicacion tiene imagen la elimina del almacenamiento
        if ($publication->image) {
            Storage::disk('public')->delete($publication->image);
        }

        // elimina la publicacion de la base de datos
        $publication->delete();

        // redirige al index con mensaje de exito
        return redirect()->route('publications.index')
            ->with('success', 'Publicación eliminada exitosamente.');
    }



}
