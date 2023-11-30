<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatSan extends Model
{
    use HasFactory;
    protected $table = 'dat_sans';
    protected $fillable = [
        'idsanbong',
        'iduser',
        'idsancha',
        'ngay',
        'khunggio',
        'giatien'
    ];

    public function getDatSanWithDay($data)
    {
        return DB::select('SELECT * from dat_sans where ngay=? and idsancha=?', $data);
    }

    public function createDatSan($data)
    {
        DB::insert('INSERT into dat_sans (idsanbong, iduser, khunggio, ngay, giatien, idsancha) values (?, ?, ?, ?, ?, ?)', $data);
        return DB::select('SELECT id from dat_sans where idsanbong = ? and iduser=? and khunggio=? and ngay=? and giatien=? and idsancha=?', $data);
    }
}
