<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;


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

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->email = $request->email;

        $client->save();
        return back()->with('message', 'Client created successfully');
    }


    public function show($id){
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }


    public function edit($id){
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $clientToUpdate = Client::findOrFail($id);
        $clientToUpdate->name = $request->name;
        $clientToUpdate->address = $request->address;
        $clientToUpdate->phone = $request->phone;
        $clientToUpdate->email = $request->email;

        $clientToUpdate->save();

        return back()->with('message', 'Client updated successfully');
    }


    public function destroy($id){
        $clientToDelete = Client::findOrFail($id);
        $clientToDelete->delete();
        return back()->with('message', 'Client deleted successfully');
    }
}
