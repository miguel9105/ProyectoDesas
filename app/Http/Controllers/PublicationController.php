<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Role;
use Illuminate\Http\Request;


class PublicationController extends Controller
{
    // metodo que muestra el listado de publicaciones con filtros y ordenamientos
    public function index(Request $request)
    {
        // crea una nueva consulta basada en el modelo publication
        $query = Publication::query();

        // si el filtro 'type' esta presente, agrega una condicion por tipo
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // si el filtro 'location' esta presente, agrega una condicion con like por ubicacion
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // si el filtro 'severity' esta presente, agrega una condicion por severidad
        if ($request->filled('severity')) {
            $query->where('severity', $request->severity);
        }

        // si el filtro 'search' esta presente, busca coincidencias en el titulo o descripcion
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // aplica el ordenamiento segun el parametro 'sort', por defecto es fecha descendente
        switch ($request->get('sort', 'date_desc')) {
            case 'date_asc':
                $query->oldest(); // ordena por la fecha mas antigua primero
                break;
            case 'severity_desc':
                $query->orderBy('severity', 'desc'); // ordena por severidad descendente
                break;
            default:
                $query->latest(); // ordena por fecha mas reciente
                break;
        }

        // obtiene las publicaciones paginadas, pasando los filtros como parametros
        $publications = $query->paginate(12)->appends($request->query());

        // obtiene todos los roles desde la base de datos
        $roles = Role::all();

        // retorna la vista 'publication' con las publicaciones y roles disponibles
        return view('publication', compact('publications', 'roles'));
    }

    // metodo que guarda una nueva publicacion
    public function store(Request $request)
    {
        // valida los datos del request segun reglas definidas
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:inundacion,incendio,terremoto,deslizamiento,otro',
            'severity' => 'required|in:alta,media,baja',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // si se subio una imagen, la guarda en el disco y asigna la ruta al array validado
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('publications', 'public');
        }

        // crea una nueva publicacion en la base de datos usando los datos validados
        Publication::create($validated);

        // redirige al index de publicaciones con un mensaje de exito
        return redirect()->route('publications.index')
            ->with('success', 'Publicacion creada exitosamente.');
    }

    // metodo que muestra los detalles de una publicacion en formato json
    public function show(Publication $publication)
    {
        // retorna la publicacion especifica como respuesta json
        return response()->json($publication);
    }

    // metodo que elimina una publicacion
    public function destroy(Publication $publication)
    {
        // si la publicacion tiene una imagen asociada, la elimina del almacenamiento
        if ($publication->image) {
            Storage::disk('public')->delete($publication->image);
        }

        // elimina la publicacion de la base de datos
        $publication->delete();

        // redirige al index de publicaciones con mensaje de exito
        return redirect()->route('publications.index')
            ->with('success', 'Publicacion eliminada exitosamente.');
    }
}
