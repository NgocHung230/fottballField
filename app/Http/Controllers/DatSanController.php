<?php

namespace App\Http\Controllers;

use App\Models\DatSan;
use App\Models\ThongBao;
use App\Models\ThongKe;
use Illuminate\Http\Request;

class DatSanController extends Controller
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
        $datsan = new DatSan();
        $dataInsert = [
            $request->idsancon,
            $request->iduser,
            $request->khunggio,
            $request->ngay,
            $request->giatien,
            $request->idsancha
        ];
        $ds = $datsan->createDatSan($dataInsert);

        $thongbao = new ThongBao();
        $thongbao->createThongBao([$request->idsancha,$request->iduser,$ds[0]->id,now()]);
        $ngay = explode('-',$request->ngay);
        $dataCheck = [
            $request->idsancha,
            $ngay[0],
            $ngay[1],
            $ngay[2]
        ];
        $TK = new ThongKe();
        $check = $TK->getThongKeByIdSanCha($dataCheck);
        if ($check)
        {
            $tmp = $check[0]->doanhso;
            $doanhso = (int)$tmp + (int)$request->giatien;
            $dataUpdate = [
                $doanhso,
                $request->idsancha,
                $ngay[0],
                $ngay[1],
                $ngay[2]
            ];
            $TK->updateThongKe($dataUpdate);
        }
        else{
            $dataInsert = [
                $request->idsancha,
                $ngay[0],
                $ngay[1],
                $ngay[2],
                $request->giatien
            ];
            $TK->addThongKe($dataInsert);
        }
        
        return redirect()->route('user.datsan',['id'=>$request->idsancha,'day'=>$request->ngay]);
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
    public function show(DatSan $datSan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatSan $datSan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatSan $datSan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatSan $datSan)
    {
        //
    }
}
