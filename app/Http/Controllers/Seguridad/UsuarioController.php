<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuarioRequest;
use App\Models\Procesos\Empresa;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::orderBy('id')->get();
        return view('seguridad.usuario.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols = Role::orderBy('id')->pluck('name', 'id')->toArray();
        $empresa = Empresa::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('seguridad.usuario.crear', compact('rols','empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        $fecha = Carbon::now();

        if($foto = User::setUsuario($request->foto_up))
        $request->request->add(['foto'=>$foto]);

        $request['password']=bcrypt($request->password);
        $request['last_login_at'] = $fecha;

        $usuario = User::create($request->all());
    
        $usuario->roles()->sync($request->role_id);
        $usuario->empresas()->sync($request->empresa_id);
        return redirect('usuarios')->with('mensaje', 'Usuario creado con éxito');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        $rols = Role::find($id);
        return view('seguridad.usuario.mostrar', compact('usuario', 'rols'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rols = Role::orderBy('id')->pluck('name', 'id')->toArray();
        $empresa = Empresa::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = User::with('roles')->findOrFail($id);
        return view('seguridad.usuario.editar', compact('data', 'rols', 'empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->status = $request['status'];
        $user->privilege = $request['privilege'];

        if ($foto = User::setUsuario($request->foto_up, $user->foto))
        $request->request->add(['foto' => $foto]);

        $user->update(array_filter($request->all()));
        $user->roles()->sync($request->role_id);
        $user->empresas()->sync($request->empresa_id);
        User::findOrFail($id)->update($request->all());

        return redirect('usuarios')->with('mensaje', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (User::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function deactivate($id)
    {
        $usuario = User::find($id);
        $usuario->status = false;
        $usuario->save();
        if($usuario){
            return response()->json($usuario);
        }
    }

    public function activate($id)
    {
        $usuario = User::find($id);
        $usuario->status = true;
        $usuario->save();
        if($usuario){
            return response()->json($usuario);
        }
    }
}