<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Requests\CreateEditClientRequest;

class ClientController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $clients =  Client::paginate(20);
        return view('clients.list', compact('clients'));
    }


    public function create(){
        return view('clients.create');
    }

    public function store(CreateEditClientRequest $request){
        $client = new Client($request->all());
        $client->save();
        return redirect('clients')->with('message', 'Cliente creado exitosamente');
    }


    public function show($id){
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }


    public function edit($id){
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }


    public function update(CreateEditClientRequest $request, $id){
        $clientToUpdate = Client::findOrFail($id);
        $clientToUpdate->update($request->all());

        return redirect('clients')->with('message', 'Cliente editado exitosamente');
    }


    public function destroy($id){
        $clientToDelete = Client::findOrFail($id);
        $clientToDelete->delete();
        return redirect('clients')->with('message', 'Cliente eliminado exitosamente');
    }
}
