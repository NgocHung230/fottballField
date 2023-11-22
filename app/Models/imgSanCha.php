<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class imgSanCha extends Model
{
    use HasFactory;

    protected $table = 'img_san_chas';
    protected $fillable = [
        'idSanCha',
        'duongdan'
    ];

    public function getImgByIdSan($data)
    {
        return DB::select('SELECT img_san_chas.* FROM san_chas JOIN img_san_chas ON (img_san_chas.idSanCha = san_chas.id)
        where san_chas.id = ?', $data);
    }

    public function getImgById($data)
    {
        return DB::select('SELECT * FROM img_san_chas 
        where id = ?', $data);
    }
    public function deleteImg($data)
    {
        DB::delete('DELETE FROM img_san_chas where id = ?', $data);
    }
}
