<?php

namespace App\Http\Controllers;

use App\Models\listaContatos;
use Illuminate\Http\Request;

class ListaContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = listaContatos::all();
        //$busca = $request->input('busca');
       // $data = listaContatos::when($busca,function($query,$busca){
       // })->orderBy('created_at','desc');

        return view('site.main',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('site.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $data = new listaContatos();    
        

        if($request->hasFile('capa')){
            $arquivo = $request->file('capa');
            $nomeArquivo = uniqid().'-capa-.'.$arquivo->getClientOriginalExtension();
            $arquivo->move(public_path('uploads'),$nomeArquivo);
            $data->capa = 'uploads/'.$nomeArquivo;
        }
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->contato  = $request->contato;
        $data->status   = $request->status;
        $data->save();

        return redirect()->route('lista_contato.index')->with('success','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
      $data = listaContatos::find($id);
      return view('site.edit',compact('data'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = listaContatos::find($id);

        if($request->hasFile('capa')){
            if($data->capa && file_exists(public_path($data->capa))){
                unlink(public_path($data->capa));
            }
          
            $arquivo = $request->file('capa');
            $nomeArquivo = uniqid().'-capa-.'.$arquivo->getClientOriginalExtension();
            $arquivo->move(public_path('uploads'),$nomeArquivo);
            $data->capa = 'uploads/'.$nomeArquivo;
            
        }
             
        $data->name     = $request->name;
        $data->contato  = $request->contato;
        $data->email    = $request->email;
        $data->status   = $request->status;
      
        $data->save();
        return redirect()->route('lista_contato.index')->with('success','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = listaContatos::findOrFail($id);

        $data->delete();
        return redirect()->route('lista_contato.index')->with('success','Excluido com sucesso!');
    }
}
