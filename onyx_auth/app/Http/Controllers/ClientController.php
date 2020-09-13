<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientType;
use App\Community;
use App\Http\Requests\CreateEditClientRequest;

class ClientController extends Controller{
	private $PAGE_SIZE = 30;

	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$clients =  Client::paginate($this->PAGE_SIZE);
		return view('clients.list', compact('clients'));
	}

	public function create(){
		$clientTypes = ClientType::all();
		$communities = Community::all();
		return view('clients.create', compact('clientTypes', 'communities'));
	}

	public function store(CreateEditClientRequest $request){
		return $this->storeOrUpdate($request);
	}

	public function show($id){
		$client = Client::findOrFail($id);
		return view('clients.show', compact('client'));
	}

	public function edit($id){
		$client = Client::findOrFail($id);
		$clientTypes = ClientType::all();
		$communities = Community::all();
		return view('clients.edit', compact('client', 'clientTypes', 'communities'));
	}

	public function update(CreateEditClientRequest $request, $id){
		return $this->storeOrUpdate($request, $id);
	}

	public function destroy($id){
		$clientToDelete = Client::findOrFail($id);
		$clientToDelete->delete();
		return redirect('clients')->with('message', 'Contacto eliminado exitosamente');
	}

	public function storeOrUpdate(CreateEditClientRequest $request, $id=null){
		if($id == null){
			$client = new Client($request->all());
		}else{
			$client = Client::findOrFail($id);
			$client->update($request->all());
		}

		$clientType = ClientType::find($request->client_type_id);
		$client->clientType()->associate($clientType);

		$community = Community::find($request->community_id);
		$client->community()->associate($community);

		$client->save();
		$message = $id == null ? 'Contacto creado exitosamente' : 'Contacto editado exitosamente';

		return redirect('clients')->with('message', $message);
	}

	public function search(Request $request){
		$querySearch = $request->keyword;
		if (strlen($querySearch) == 0) { // clear search
			$clients =  Client::paginate($this->PAGE_SIZE);
		} else {
			$clients = Client::where('email', 'LIKE', '%' . $querySearch . '%')
				->orWhere('business_name', 'LIKE', '%' . $querySearch . '%')
				->orWhere('name', 'LIKE', '%' . $querySearch . '%')
				->orWhere('lastname', 'LIKE', '%' . $querySearch . '%')
				->orWhere('phone', $querySearch)
				->orWhere('secondary_phone', $querySearch)
				->paginate($this->PAGE_SIZE);
			$clients->appends(array('keyword' => $querySearch));
		}

		if ($request->ajax()) {
			return view('clients.partials.results', compact('clients'));
		} else {
			return view('clients.list', compact('clients', 'querySearch'));
		}
	}
}
