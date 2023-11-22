<?php

namespace App\Http\Controllers;

use App\Models\banggia;
use Illuminate\Http\Request;

class BanggiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create5(Request $request)
    {
        $banggia = new banggia();
        $data = [
            'Sân 5',
            $request->khunggio,
            $request->giatien,
            $request->idsancha
        ];
        $banggia->createBanggia($data);
        return redirect()->route('client.edit');
    }

    public function create7(Request $request)
    {
        $banggia = new banggia();
        $data = [
            'Sân 7',
            $request->khunggio,
            $request->giatien,
            $request->idsancha
        ];
        $banggia->createBanggia($data);
        return redirect()->route('client.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(banggia $banggia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(banggia $banggia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, banggia $banggia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $banggia = new banggia();
        
        $banggia->deleteById([$request->id]);
        return redirect()->route('client.edit');
    }
}
