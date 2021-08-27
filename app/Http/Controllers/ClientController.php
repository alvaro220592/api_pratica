<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Client::create($request->all());

        if($result){
            return ['Mensagem' => 'Dados salvos com sucesso'];
        }else{
            return ['Mensagem' => 'Erro ao salvar'];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Client::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $result = $client->update($request->all());
        
        if($result){
            return ['Mensagem' => 'Dados salvos com sucesso'];
        }else{
            return ['Mensagem' => 'Erro ao salvar'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Client::findOrFail($id)->delete();

        if($result){
            return ['Mensagem' => 'Dados deletados com sucesso'];
        }else{
            return ['Mensagem' => 'Erro ao deletar'];
        }
    }
}
