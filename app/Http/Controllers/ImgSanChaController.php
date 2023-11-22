<?php

namespace App\Http\Controllers;

use App\Models\imgSanCha;
use App\Models\SanCha;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;

class ImgSanChaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $image = imgSanCha::findOrFail($id);
        return view('img/hinhanh', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $file = $request->file('duongdan');
        $ten_hinh_anh       =   Str::uuid() . '-' . $request->idSanCha . '.' . $file->getClientOriginalExtension();
        $data['duongdan']   =   $ten_hinh_anh;
        $file->move('hinh-anh-san', $ten_hinh_anh);
        imgSanCha::create($data);

        return response()->json([
            'status'    => true,
            'message'   => "Thêm mới thành công"
        ]);
    }


    public function upload(Request $request)
    {
        $image = new imgSanCha();

        // Lưu hình ảnh vào thư mục public/images
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = '/images/' . $fileName;
        $file->move(public_path('images'), $fileName);

        // Lưu thông tin hình ảnh vào database
        // $image->file_name = $fileName;
        $image->duongdan = $filePath;
        $image->idSanCha = $request->idsan; // Thay thế bằng cách xác định user_id của người dùng

        $image->save();
        // $SanCha = new SanCha();
        // $data = $SanCha->findSanChaById([$request->idsan]);
        // $img = new imgSanCha();
        // $dataImg = $img->getImgByIdSan([$data[0]->id]);
        return redirect()->route('client.edit');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          
    }

    /**
     * Display the specified resource.
     */
    public function show(imgSanCha $imgSanCha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(imgSanCha $imgSanCha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, imgSanCha $imgSanCha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(imgSanCha $imgSanCha)
    {
        //
    }
}
