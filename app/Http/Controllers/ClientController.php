<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\Clients\ClientStore;
use App\Http\Requests\Clients\ClientUpdate;

class ClientController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.index', [
            'clients' => $clients,
        ]);
    }

    /**
     *
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     *
     */
    public function store(ClientStore $request)
    {
        $client = Client::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'address' => $request->input('address'),
            'ico' => $request->input('ico'),
            'dic' => $request->input('dic'),
            'icdhp' => $request->input('icdhp'),
            'email_address' => $request->input('email_address'),
            'website_url' => $request->input('website_url'),
            'phone_number' => $request->input('phone_number'),
        ]);

        return redirect()->route('client')->with('success', ['The client has been created successfully.']);
    }

    /**
     *
     */
    public function edit($clientId)
    {
        $client = Client::where('id', $clientId)->first();

        // validation
        if(! $client) {
            return redirect()->back()->withErrors('The client you are looking for does not exist');
        }

        return view('client.edit', [
            'client' => $client
        ]);
    }

    /**
     *
     */
    public function update(ClientUpdate $request, Client $client)
    {
        $client->firstname = $request->input('firstname');
        $client->lastname = $request->input('lastname');
        $client->address = $request->input('address');
        $client->ico = $request->input('ico');
        $client->dic = $request->input('dic');
        $client->icdhp = $request->input('icdhp');
        $client->email_address = $request->input('email_address');
        $client->website_url = $request->input('website_url');
        $client->phone_number = $request->input('phone_number');

        $client->save();

        return redirect()->route('client')->with('success', ['The client was updated successfully']);
    }

    public function destroy(\App\Models\Client $client)
    {
        // @TODO: fire events to remove projects and contacts
        $client->delete();

        return redirect()->back()->with('success', ['The client and all their information has been deleted successfully']);
    }
}
