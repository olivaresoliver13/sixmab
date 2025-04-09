<?php

namespace App\Http\Controllers\Noticias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Noticias\Noticia;
use App\Http\Requests\NoticiaRequest;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privilege = \Auth::user()->privilege;

        if ($privilege === true) {
            $noticia = Noticia::all();
        } else {
            $noticia = Noticia::all()->where('estado', 1);
        } 

        return view('noticias.index', compact('noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaRequest $request)
    {
        $request['user_register'] = Auth::user()->id;
        
        if($foto = Noticia::setNoticia($request->foto_up))
        $request->request->add(['foto'=>$foto]);
        Noticia::create($request->all());
        return redirect('noticias')->with('mensaje', 'Noticia creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);
        return view('noticias.mostrar',compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Noticia::findOrFail($id);
        return view('noticias.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaRequest $request, $id)
    {
        $noticia = Noticia::findOrFail($id);
        if ($foto = Noticia::setNoticia($request->foto_up, $noticia->foto))
            $request->request->add(['foto' => $foto]);
            $noticia->update($request->all());
            Noticia::findOrFail($id)->update($request->all());
        return redirect('noticias')->with('mensaje', 'Noticia actualizada con éxito');     
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
            if (Noticia::destroy($id)) {
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
        $noticia = Noticia::find($id);
        $noticia->estado = false;
        $noticia->save();
        if($noticia){
            return response()->json($noticia);
        }
    }

    public function activate($id)
    {
        $noticia = Noticia::find($id);
        $noticia->estado = true;
        $noticia->save();
        if($noticia){
            return response()->json($noticia);
        }
    }
}
