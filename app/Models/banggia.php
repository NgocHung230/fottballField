<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class banggia extends Model
{
    use HasFactory;
    protected $table = 'banggias';
    protected $fillable = [
        'loaisan',
        'khunggio',
        'giatien',
        'idsancha'
    ];

    public function findSan5ByIdCha($data){

        return DB::select('SELECT banggias.* FROM banggias JOIN san_chas on (banggias.idsancha = san_chas.id)
        where loaisan = ? AND san_chas.id= ? ORDER BY banggias.khunggio ASC', $data);
    }

    public function findSan7ByIdCha($data){

        return DB::select('SELECT banggias.* FROM banggias JOIN san_chas on (banggias.idsancha = san_chas.id)
        where loaisan = ? AND san_chas.id= ? ORDER BY banggias.khunggio ASC', $data);
    }

    public function createBanggia($data)
    {
        DB::insert('INSERT INTO banggias (loaisan, khunggio, giatien, idsancha) values (?, ?,?,?)', $data);
    }

    public function deleteById($data)
    {
        DB::delete('DELETE FROM banggias where id = ?', $data);
    }
}
