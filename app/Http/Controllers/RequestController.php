<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8001/api/items/');
        $items = json_decode($response->getBody()->getContents());
        // dd($items);
        return view('index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $client = new Client();
        $response = $client->request('POST', 'http://127.0.0.1:8001/api/items/', [
            'form_params' => [
                'name' => $request->name,
                'description' => $request->description,
            ]
        ]);
        return redirect('request')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:8001/api/items/'.$id);
        $item = json_decode($response->getBody()->getContents());
        return view('edit' , compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $client = new Client();
        $response = $client->request('PUT', 'http://127.0.0.1:8001/api/items/'.$id, [
            'form_params' => [
                'name' => $request->name,
                'description' => $request->description,
            ]
        ]);

        return redirect('request')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://127.0.0.1:8001/api/items/'.$id);
        return redirect('request')->with('warning', 'Item deleted successfully.');
    }
}
