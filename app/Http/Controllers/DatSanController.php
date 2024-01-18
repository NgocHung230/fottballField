<?php

namespace App\Http\Controllers;

use App\Models\DatSan;
use App\Models\ThongBao;
use App\Models\ThongKe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd( $request->khunggio);
           
        $gt= $request->giatien;
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('Y-m-d H:i:s');
        // echo "Thời gian hiện tại ở Việt Nam là: " . $currentDateTime;
        $thongbao = new ThongBao();
        $thongbao->createThongBao([$request->idsancha,$request->iduser,$ds[0]->id,$currentDateTime]);
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
        $user = Auth::guard('users')->user();
        $dataUpdateUser = [
            $user->acount - $gt,
            $user->id
        ];
        $US = new User();
        $US->updateAcountById($dataUpdateUser);
        $user2 = $US->getUserByIdSancha([$request->idsancha])[0];
        $dataUpdateUser2 = [
            $user2->acount + $gt,
            $user2->id
        ];
        $US->updateAcountById($dataUpdateUser2);

        if ($user->role=='user') return redirect()->route('user.datsan',['id'=>$request->idsancha,'day'=>$request->ngay]);
        if ($user->role=='admin') return redirect()->route('admin.datsan',['id'=>$request->idsancha,'day'=>$request->ngay]);
        if ($user->role=='client') return redirect()->route('client.datsan',['id'=>$request->idsancha,'day'=>$request->ngay]);
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
