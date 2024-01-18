<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThongKe extends Model
{
    use HasFactory;
    protected $table = 'thong_kes';
    protected $fillable = [
        'idsancha',
        'ngay',
        'thang',
        'nam',
        'doanhso'
    ];

    public function addThongKe($data)
    {
        DB::insert('INSERT into thong_kes (idsancha, ngay,thang,nam,doanhso) values (?, ?,?,?,?)', $data);
    }

    public function getThongKeByIdSanCha($data)
    {
        return DB::select('SELECT * from thong_kes where idsancha = ? and ngay=? and thang=? and nam=?', $data);
    }

    public function updateThongKe($data)
    {
        DB::update('UPDATE thong_kes set doanhso = ? where idsancha = ? and ngay=? and thang=? and nam=?', $data);
    }

    public function getThongKeNgayHienTai($data)
    {
        return DB::select('SELECT * from thong_kes where idsancha = ? and ngay<=? and thang=? and nam=?', $data);
    }

    public function getThongKeThangHienTai($data)
    {
        return DB::select('SELECT SUM(doanhso) AS doanhso,thang FROM thong_kes WHERE idsancha = ? AND nam = ? and( thang < ? or((ngay<=?)and thang=?)) GROUP BY thang', $data);
    }

    public function getThongKeNgay($data)
    {
        return DB::select('SELECT * from thong_kes where idsancha = ? and thang = ? and nam = ?', $data);
    }

    public function getThongKeThang($data)
    {
        return DB::select('SELECT SUM(doanhso) AS doanhso,thang FROM thong_kes WHERE idsancha = ?  AND nam = ?  GROUP BY thang', $data);

    }
}
