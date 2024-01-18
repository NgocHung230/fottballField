<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'thong_baos';
    protected $fillable = [
        'idsancha',
        'iduser',
        'iddatsan'
    ];

    public function createThongBao($data)
    {
        DB::insert('INSERT into thong_baos (idsancha, iduser, iddatsan,created_at) values (?, ?,?,?)', $data);
    }

    public function getThongBaoByIDUser($data)
    {
        return DB::select('SELECT *,thong_baos.created_at,thong_baos.updated_at,san_bongs.tensan as tensancon,san_chas.tensan as tensancha,thong_baos.id from (((users join thong_baos on users.id=thong_baos.iduser)
        join san_chas on san_chas.id = thong_baos.idsancha) join dat_sans on dat_sans.id = thong_baos.iddatsan)
        join san_bongs on dat_sans.idsanbong = san_bongs.id
        where thong_baos.iduser = ? order by thong_baos.created_at ASC', $data);
    }

    public function getThongBaoByIDSanCha($data)
    {
        return DB::select('SELECT *,thong_baos.created_at,thong_baos.updated_at,san_bongs.tensan as tensancon,san_chas.tensan as tensancha from (((users join thong_baos on users.id=thong_baos.iduser)
        join san_chas on san_chas.id = thong_baos.idsancha) join dat_sans on dat_sans.id = thong_baos.iddatsan)
        join san_bongs on dat_sans.idsanbong = san_bongs.id
        where thong_baos.idsancha = ? order by thong_baos.created_at ASC', $data);
    }

    public function updateThongBaoById($data)
    {
        DB::update('UPDATE thong_baos set updated_at = ? where id = ?', $data);
    }
}
