<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Mostrar todos los roles (opcional).
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Mostrar formulario para crear un nuevo rol.
     */
    public function create()
    {
        return view('createRole'); // Asegúrate de que este archivo existe en resources/views/
    }

    /**
     * Guardar un nuevo rol en la base de datos.
     */
    public function store(Request $request)
{
    $request->validate([
    
        'administrators' => 'required|string|max:255',
        'community' => 'required|string|max:255',
        'zone_community' => 'required|string|max:255',
        'mail_administrator' => 'required|email|max:255',
    ]);

    Role::create([
   
        'administrators' => $request->input('administrators'),
        'community' => $request->input('community'),
        'zone_community' => $request->input('zone_community'),
        'mail_administrator' => $request->input('mail_administrator'),
    ]);

    return redirect()->back()->with('success', 'Rol creado exitosamente.');
}
    /**
     * Mostrar un rol específico (opcional).
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Mostrar formulario para editar un rol (opcional).
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Actualizar un rol en la base de datos (opcional).
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'administrators' => 'required|string|max:255',
            'community' => 'required|string|max:255',
            'zone_community' => 'required|string|max:255',
            'mail_administrator' => 'required|email|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Eliminar un rol (opcional).
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado.');
    }
}
