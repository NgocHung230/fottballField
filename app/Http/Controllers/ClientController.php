<?php

namespace App\Http\Controllers;

use App\Models\banggia;
use App\Models\DatSan;
use App\Models\imgSanCha;
use App\Models\SanBong;
use App\Models\SanCha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(){

        return view('client/home');
    }

    public function quanlysanbong(){
        $SanCha = new SanCha();
        $data = $SanCha->findSanChaByIdUser([Auth::guard('users')->user()->id]);
        $Banggia = new banggia();
        $banggia5 = $Banggia->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $banggia7 = $Banggia->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $SanBong = new SanBong();
        $dataSan5 = $SanBong->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $dataSan7 = $SanBong->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $day = date('d-m-Y');
        if ($data==null) return view('client/create');
        $img = new imgSanCha();
        $dataImg = $img->getImgByIdSan([$data[0]->id]);
        $datsan = new DatSan();
        $dataDatsan = $datsan->getDatSanWithDay([$day,$data[0]->id]);
        return view('client/quanlysanbong',[
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
    public function quanlysanbongwithdb(Request $request){
        $SanCha = new SanCha();
        $data = $SanCha->findSanChaByIdUser([Auth::guard('users')->user()->id]);
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
        return view('client/quanlysanbong',[
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

    // public function edit()
    // {

    // }
    public function edit(Request $request)
    {
        $SanCha = new SanCha();
        $data = $SanCha->findSanChaByIdUser([Auth::guard('users')->user()->id]);
        $img = new imgSanCha();
        $dataImg = $img->getImgByIdSan([$data[0]->id]);

        $Banggia = new banggia();
        $banggia5 = $Banggia->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $banggia7 = $Banggia->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $SanBong = new SanBong();
        $dataSan5 = $SanBong->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $dataSan7 = $SanBong->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $request->session()->put([
            'data'=> $data[0],
            'img'=> $dataImg,
            'san5'=>$dataSan5,
            'san7'=>$dataSan7,
            'banggia5'=>$banggia5,
            'banggia7'=>$banggia7,

        ]);
        // dd($dataSan5);
        // dd(session('san5'));
        return view('client/edit');
        // return redirect()->route('client.edit')->with(['data'=>$data[0],'img'=>$dataImg]);

    }
    public function update(Request $request){
        $SanCha = new SanCha();

        $check = $SanCha->findSanChaByIdUser([Auth::guard('users')->user()->id]);

        if ($check) 
        {
            $dataUpdate =[
                $request->tensan,
                $request->diachi,
                $request->sdt,
                $check[0]->id
            ];

            $SanCha->updateById($dataUpdate);
        }
        else
        {
            $dataAdd =[
                $request->tensan,
                $request->diachi,
                $request->sdt,
                Auth::guard('users')->user()->id
            ];
            $SanCha->addSanCha($dataAdd);
        }
        return redirect()->route('client.quanly');

    }

    public function destroy(Request $request)
    {
        $img = new imgSanCha();
        // dd(Storage::exists($img->getImgById([$request->idimg])[0]->duongdan));
        // dd($img->getImgById([$request->idimg])[0]->duongdan);
        // dd(File::exists('D:/PHP/FootballFieldManagement/public'.$img->getImgById([$request->idimg])[0]->duongdan));
        if(File::exists('D:/PHP/FootballFieldManagement/public'.$img->getImgById([$request->idimg])[0]->duongdan)) {
            File::delete('D:/PHP/FootballFieldManagement/public'.$img->getImgById([$request->idimg])[0]->duongdan);
            // Xoá thành công
        } else {
            // File không tồn tại hoặc không thể xoá
        }
        $img->deleteImg([$request->idimg]);
        // $SanCha = new SanCha();
        // $data = $SanCha->findSanChaById([$request->idsan]);
        // $img = new imgSanCha();
        // $dataImg = $img->getImgByIdSan([$data[0]->id]);
        // $request->session()->put('data', $data[0]);
        // $request->session()->put('img', $dataImg);
        // return redirect()->route('client.edit');
        return redirect()->route('client.edit');
    }
}
