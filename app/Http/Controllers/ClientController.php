<?php

namespace App\Http\Controllers;

use App\Models\banggia;
use App\Models\DatSan;
use App\Models\imgSanCha;
use App\Models\SanBong;
use App\Models\SanCha;
use App\Models\ThongBao;
use App\Models\ThongKe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(){

        $sanbong = new SanCha();
        $data = $sanbong->getAll();
        $dataimg = new imgSanCha();
        for ($i=0;$i<count($data);$i++)
        {
            $img = $dataimg->getImgByIdSan([$data[$i]->id]);
            if ($img)
                $data[$i]->img=$img[0]->duongdan;
        }
        return view('client/home',['data'=>$data]);
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
        // dd($dataImg);
        
        return view('client/datsan',[
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
    public function quanlysanbong(){
        $SanCha = new SanCha();
        $data = $SanCha->findSanChaByIdUser([Auth::guard('users')->user()->id]);
        if ($data==null) return view('client/create');

        $Banggia = new banggia();
        $banggia5 = $Banggia->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $banggia7 = $Banggia->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $SanBong = new SanBong();
        $dataSan5 = $SanBong->findSan5ByIdCha(['Sân 5',$data[0]->id]);
        $dataSan7 = $SanBong->findSan5ByIdCha(['Sân 7',$data[0]->id]);
        $day = date('d-m-Y');
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

    public function thongke(Request $request)
    {
        $SC = new SanCha();
        $SanCha = $SC->findSanChaByIdUser([Auth::guard('users')->user()->id]);
        $ngay = date('d-m-Y');
        $day = explode('-',$ngay);
        $TK = new ThongKe();
        $theongay = [
            $SanCha[0]->id,
            $day[0],
            $day[1],
            $day[2]
        ];
        $dataNgay = $TK->getThongKeNgayHienTai($theongay);
        $theothang = [
            $SanCha[0]->id,
            $day[1],
            $day[2],
            $day[0]
        ];
        $dataThang = $TK->getThongKeThangHienTai($theothang);
        // dd($dataThang);
        return view('client/thongke',['dataNgay'=>$dataNgay, 'dataThang'=>$dataThang,'thang'=>$day[1],'nam'=>$day[2]]);
    }

    public function thongkepost(Request $request)
    {
        $SC = new SanCha();
        $SanCha = $SC->findSanChaByIdUser([Auth::guard('users')->user()->id]);
        
        $ngay = date('d-m-Y');
        $day = explode('-',$ngay);
        $TK = new ThongKe();

        if ($request->thang==$day[1])
        {
            $theongay = [
                $SanCha[0]->id,
                $day[0],
                $day[1],
                $day[2]
            ];
            $dataNgay = $TK->getThongKeNgayHienTai($theongay);
        }
        else
        {
            $theongay = [
                $SanCha[0]->id,
                $request->thang,
                $day[2]
            ];
            $dataNgay = $TK->getThongKeNgay($theongay);
        }

        
        if ($request->nam==$day[2])
        {
            $theothang = [
                $SanCha[0]->id,
                $day[1],
                $day[2],
                $day[0]
            ];
            $dataThang = $TK->getThongKeThangHienTai($theothang);
        }
        else
        {
            $theothang = [
                $SanCha[0]->id,
                $request->nam
            ];
            $dataThang = $TK->getThongKeThang($theothang);
        }
        
        // dd($request->nam);
        // dd($dataThang);
        // dd($dataNgay);

        return view('client/thongke',['dataNgay'=>$dataNgay, 'dataThang'=>$dataThang,'thang'=>$request->thang,'nam'=>$request->nam]);
    }

    public function thongbao()
    {
        $thongbao = new ThongBao();
        $SanCha = new SanCha();
        $id = $SanCha->findSanChaByIdUser([Auth::guard('users')->user()->id]);
        $data = $thongbao->getThongBaoByIDSanCha([$id[0]->id]);
        // dd($data);
        return view('client/thongbao',['data'=>$data]);
    }

    public function profile()
    {
        return view('client/profile');
    }

    public function profile_edit(Request $request)
    {
        $user = new User();
        // dd($request->hoten);
        $data = $user->getUserById([Auth::guard('users')->user()->id])[0];
        $dataUpdate = [
            $request->hoten,
            $data->email,
            $data->role,
            $data->id,
        ];
        $user->updateById($dataUpdate);
        session()->put('sc','Cập nhật thành công!');
        return redirect()->route('client.profile');
    }

    public function password_update(Request $request)
    {
        // dd($request->pw);
        $user = new User();
        // dd($request->hoten);
        $data = $user->getUserById([Auth::guard('users')->user()->id])[0];
        if (Hash::check($request->pw, $data->password))
        {
            $user->updatePass([Hash::make($request->npw),$data->id]);
            session()->put('ms','Đổi mật khẩu thành công!');

            return redirect()->route('client.profile');

        }
        session()->put('ms','Mật khẩu không chính xác!!');

        return redirect()->route('client.profile');

    }
}
