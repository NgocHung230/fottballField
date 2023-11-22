<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function index(){
        return view('admin/home');
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
}
