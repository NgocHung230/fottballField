<?php

namespace App\Http\Controllers;

use App\Models\imgSanCha;
use App\Models\SanCha;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home',['data'=>$data]);
    }
}
