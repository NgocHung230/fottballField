<?php

namespace App\Http\Controllers;

use App\Models\banggia;
use App\Models\DatSan;
use App\Models\imgSanCha;
use App\Models\SanBong;
use App\Models\SanCha;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanbong = new SanCha();
        $data = $sanbong->getAll();
        return view('user/home',['data'=>$data]);
    }

    public function DatSanFun(Request $request)
    {
        $SanCha = new SanCha();
        $data = $SanCha->findSanChaById([$request->id]);
        $Banggia = new banggia();
        $banggia5 = $Banggia->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $banggia7 = $Banggia->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $SanBong = new SanBong();
        $dataSan5 = $SanBong->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $dataSan7 = $SanBong->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        if ($data==null) return view('client/create');
        $img = new imgSanCha();
        $dataImg = $img->getImgByIdSan([$data[0]->id]);

        $day = $request->day;
        $datsan = new DatSan();
        $dataDatsan = $datsan->getDatSanWithDay([$day,$data[0]->id]);
        return view('user/datsan',[
            'data'=>$data[0],
            'img'=>$dataImg,
            'banggia5'=>$banggia5,
            'banggia7'=>$banggia7,
            'datasan5'=>$dataSan5,
            'datasan7'=>$dataSan7,
            'day'=>$day,
            'datsan'=>$dataDatsan
        ]);
    }

    

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
