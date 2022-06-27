<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fornecedor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $fornecedor = new Fornecedor;

       $fornecedor->nome = $request->input('nome');
       $fornecedor->cnpj = $request->input('cnpj');
       $fornecedor->telefone = $request->input('telefone');
       $fornecedor->save();
       return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function editIndex(Fornecedor $fornecedor)
    {
        return view('fornecedor.edit');
    }
     public function CheckFornecedor(Request $request){
        $fornecedor = Fornecedor::where('cnpj','=',$request->input('cnpj'))->first();

        if(is_null($fornecedor)){
            return redirect()->back()->with('Menssagem','Fornecedor Não encontrado');
        }else{
         
            return redirect()->back()->with(['Match' => 'Fornecedor Encontrado', 'teste' => session(['fornecedor' => $fornecedor])]);
        }
     }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        $fornecedor = session('fornecedor');
        
        Fornecedor::where('cnpj','=',$fornecedor->cnpj)->update(array_filter($request->except(['_token'])));
        return redirect()->back()->with('Menssagem', 'Fornecedor Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function DeleteIndex(Request $request){
        return view('fornecedor.delete');
    }
    public function destroy(Request $request)
    {
        
        $fornecedor = Fornecedor::where('cnpj','=',$request->input('cnpj'));
        $fornecedor->delete();
        return redirect()->back()->with('menssagem','Fornecedor deletado com sucesso');
    }
}
