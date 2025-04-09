<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class PermisoRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Role::orderBy('id')->pluck('name', 'id')->toArray();
        $permisos = Permission::get();
        $permisosRols = Permission::with('roles')->get()->pluck('roles', 'id')->toArray();
        return view('seguridad.permiso-rol.index', compact('rols', 'permisos', 'permisosRols'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $permisos = new Permission();
            if ($request->input('estado') == 1) {
                $permisos->find($request->input('permission_id'))->roles()->attach($request->input('role_id'));
                return response()->json(['respuesta' => 'El rol se asignó correctamente']);
            } else {
                $permisos->find($request->input('permission_id'))->roles()->detach($request->input('role_id'));
                return response()->json(['respuesta' => 'El rol se eliminó correctamente']);
            }
        } else {
            abort(404);
        }
    }
}