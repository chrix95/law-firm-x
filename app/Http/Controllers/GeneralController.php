<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function addClient(Request $request)
    {
        return view('pages.client.form');
    }

    public function listClient(Request $request)
    {
        $clients = Client::orderBy('id', 'desc')->get();
        return view('pages.client.list', [
            'clients' => $clients,
        ]);
    }

    public function viewClient(Request $request, $clientId)
    {
        $client = Client::where('client_id', $clientId)->first();
        if (!$client) {
            abort(404);
        }
        return view('pages.client.preview', [
            'client' => $client,
        ]);
    }
}
