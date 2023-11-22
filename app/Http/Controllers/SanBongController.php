<?php

namespace App\Http\Controllers;

use App\Models\SanBong;
use Illuminate\Http\Request;

class SanBongController extends Controller
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
    public function create(Request $request)
    {
        $SB = new SanBong();
        $dataInsert = [
            $request->tensan,
            $request->loaisan,
            $request->idsancha
        ];
        $SB->createSan($dataInsert);
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
    public function show(SanBong $sanBong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SanBong $sanBong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SanBong $sanBong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $SB = new SanBong();
        $SB->deleteById([$request->id]);
        return redirect()->route('client.edit');
    }
}
