<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $users;
    public function __construct()
    {
        $users = new User();
    }
    public function index()
    {
        return view('auth');
    }

    public function register(Request $request)
    {


        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:Users',
                'psw' => 'required',
                'repsw' => 'required|same:psw'
            ],
            [
                'name.required' => ' Họ tên không được để trống',
                'email.required' => ' Email không được để trống',
                'email.email' => ' Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'psw.required' => 'Mật khẩu không được để trống',
                'repsw.required' => 'Nhập lại mật khẩu không được để trống',
                'repsw.same' => 'Không trùng khớp mật khẩu'
            ]
        );
        $dataInsert = [
            'user',
            $request->name,
            $request->email,
            Hash::make($request->psw),
            0,
            date('Y-m-d H:i:s')

        ];
        $users = new User();
        $users->addUser($dataInsert);

        return redirect()->back()->with(['SC' => 'Đã đăng ký thành công']);;
    }

    public function login(Request $request)
    {
        $users = new User();

        // $request->validate([
        //     'emaillogin' => 'required|email',
        //     'password' => 'required',
        // ],
        // [
        //     'emaillogin.required' => ' Email không được để trống',
        //     'emaillogin.email' => ' Email không đúng định dạng',
        //     'psw.required' => 'Mật khẩu không được để trống',
        // ]);



        // return redirect()->route('index');
        // return view('home',array('id'=>$id));
        $check = Auth::guard('users')->attempt([
            'email' => $request->emaillogin,
            'password' => $request->password
        ]);

        if ($check){
        // return view('home',array('id'=>'123'));


            
            if (Auth::guard('users')->user()->role=='user') return redirect()->route('user.home');
            if (Auth::guard('users')->user()->role=='client') return redirect()->route('client.home');
            return redirect()->route('admin.home');
        } else return redirect()->back()->withInput()->withErrors(['err' => 'Thông tin đăng nhập không chính xác.']);
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect()->route('auth');
    }
}
