<?php

namespace App\Http\Controllers;

use App\Models\banggia;
use App\Models\DatSan;
use App\Models\imgSanCha;
use App\Models\SanBong;
use App\Models\SanCha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public  function index(){
        $sanbong = new SanCha();
        $data = $sanbong->getAll();
        $dataimg = new imgSanCha();
        for ($i=0;$i<count($data);$i++)
        {
            $img = $dataimg->getImgByIdSan([$data[$i]->id]);
            if ($img)
                $data[$i]->img=$img[0]->duongdan;
        }
        return view('admin/home',['data'=>$data]);
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
        
        return view('admin/datsan',[
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
    public  function quanly(){
        $user = new User();
        $data = $user->getAllUser();
        // dd($data);
        return view('admin/quanly',['data'=>$data]);
    }

    public function edit(Request $request)
    {
        // dd($request->id);
        $user = new User();
        $data = $user->getUserById([$request->id]);
        // dd($data[0]);
        return view('admin/edit',['data'=>$data[0]]);
    }
    public function destroy(Request $request)
    {
        $user = new User();
        $user->deleteById([$request->id]);
        $sancha = new SanCha();
        $sancha->deleteByIdUser([$request->id]);
        return redirect()->route('admin.quanly')->with('thongbao','Đã xoá người dùng thành công!');
    }
    public function update(Request $request)
    {
        // $request->validate([
        //     'hoten' => 'required',
            
        // ],
        // [
        //     'hoten.required' => ' Họ tên không được để trống',
            
        // ]);
        $user = new User();
        $dataUpdate = [
            $request->hoten,
            $request->email,
            $request->role,
            $request->id,
        ];
        $user->updateById($dataUpdate);
        return redirect()->route('admin.quanly')->with('thongbao','Cập nhật người dùng thành công!');
    }

    public function profile()
    {
        return view('admin/profile');
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
        return redirect()->route('admin.profile');
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

            return redirect()->route('admin.profile');

        }
        session()->put('ms','Mật khẩu không chính xác!!');

        return redirect()->route('admin.profile');

    }
}
