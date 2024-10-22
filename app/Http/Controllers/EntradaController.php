<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $texto=trim($request->get('texto'));
        $registros=DB::table('entrada')
                    ->select('id','evento_id','pago', 'dni')
                    ->where('id','LIKE','%'.$texto.'%')
                    ->orWhere('dni','LIKE','%'.$texto.'%')
                    ->orderBy('id','desc')
                    ->paginate(10);
        return view('entrada.index',compact(['registros','texto']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // //
        // $entrada= new Entrada();
        // $categorias=DB::table('entrada')
        //             ->select('id','evento_id','pago','dni')
        //             ->orderBy('evento_id','asc')
        //             ->get();
        // return view('entrada.action',compact('entrada','entrada'));

        $entrada= new Entrada();
        return view('entrada.action',['entrada'=>new Entrada()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $registro = new Entrada();
            $registro->evento_id=$request->input('evento_id');
            $registro->pago=$request->input('pago');
            $registro->dni=$request->input('dni');
            $registro->save();
            return redirect()->route('entrada.index')->with('mensaje','Registro '.$registro->nombre.' creado safistactoriamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('entrada.index')->with('error','No se puede crear el registro');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $entrada=Entrada::findOrFail($id);
        return view('entrada.action',compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $registro=Entrada::findOrFail($id);
            $registro->delete();
            return redirect()->route('entrada.index')->with('mensaje','Entrada par el evento para evento '.$registro->evento_id.' eliminado correctamente.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('entrada.index')->with('error','No se puede eliminar la entrada par el evento para evento '.$registro->evento_id.' porque esta siendo usado.');
        }

    }
}
