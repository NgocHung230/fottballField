<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanBong extends Model
{
    use HasFactory;
    protected $table = 'san_bongs';
    protected $fillable = [
        'tensan',
        'loaisan',
        'idsancha'
    ];

    public function findSan5ByIdCha($data){

        return DB::select('SELECT san_bongs.* FROM san_bongs JOIN san_chas on (san_bongs.idsancha = san_chas.id)
        where loaisan = ? AND san_chas.id= ? ORDER BY san_bongs.tensan ASC', $data);
    }

    public function findSan7ByIdCha($data){

        return DB::select('SELECT san_bongs.* FROM san_bongs JOIN san_chas on (san_bongs.idsancha = san_chas.id)
        where loaisan = ? AND san_chas.id= ? ORDER BY san_bongs.tensan ASC', $data);
    }

    public function createSan($data)
    {
        DB::insert('INSERT INTO san_bongs (tensan, loaisan, idsancha) values (?, ?,?) ' , $data);
    }

    public function deleteById($data)
    {
        DB::delete('DELETE FROM san_bongs WHERE id = ? ', $data);
    }
}
