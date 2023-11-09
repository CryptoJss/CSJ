<?php

namespace App\Http\Controllers;

use App\Models\Autores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $table = 'autores';
    public function index()
    {
        $data = DB::table("autores")
                ->select("autores.*")
                ->paginate(15);

        return view($this->table.'.index', [
            'table' =>  $this->table,
            'title'=>'Catalogo de Autores',
            'data'=> $data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->table.'.create', [
            'table' =>  $this->table,
            'title'=>'Agregar Autores'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required'
        ]);
        $autores = new Autores();
        $autores->Nombre     = $request->Nombre;
        $autores->Apellido   = $request->Apellido;
        $autores->Contacto   = $request->Contacto;
        $autores->Fecha      = $request->Fecha;
        $autores->Direccion  = $request->Direccion;
        $e             = $autores->save();
        return redirect()->route($this->table.'.index')
                        ->with(($e)?'info':'danger',($e)?'Guardado con exito':'Ocurrio un problema al guardar el autor intente de nuevo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autores $autores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autores $autoresmodel, $id)
    {
        $r = $autoresmodel::findOrFail($id);
        return view($this->table.'.edit', ['table' =>  $this->table, 'title'=>'Actualizar Autor','data'=> $r]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autores $autores, $id)
    {
        $r = $autores::findOrfail($id);
        $r->Nombre     = $request->Nombre;
        $r->Apellido   = $request->Apellido;
        $r->Contacto   = $request->Contacto;
        $r->Fecha      = $request->Fecha;
        $r->Direccion  = $request->Direccion;
        $e           = $r->save();
        return redirect()->route($this->table.'.index')
                        ->with(($e)?'info':'danger',($e)?'Se edito un registro con exito. ':'Ocurrio un problema al editar el autor intente de nuevo.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autores $autoresmodel, $id)
    {
        $r = $autoresmodel::findOrfail($id);
        $m = $r->delete();
        return redirect()->route($this->table.'.index')
                        ->with(($m)?'info':'danger',($m)?'Se borro un registro correctamente':'Ocurrio un error al borrar el registro... Intente de nuevo');

    }
}
