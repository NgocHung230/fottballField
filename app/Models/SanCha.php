<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanCha extends Model
{
    use HasFactory;
    protected $table = 'san_chas';
    protected $fillable = [
        'tensan',
        'diachi',
        'sdt',
        'quanly'
    ];
    public function getAll()
    {
        return DB::select('SELECT * from san_chas');
    }
    public function findSanChaByIdUser($data)
    {
        return DB::select('SELECT san_chas.* FROM users JOIN san_chas ON (san_chas.quanly = users.id) where users.id = ?', $data);
    }

    public function addSanCha($data)
    {
        DB::insert('INSERT INTO san_chas (tensan,diachi,sdt,quanly) values (?, ?,?,?)', $data);
    }

    public function updateById($data){
        DB::update('UPDATE san_chas SET tensan = ? , diachi = ? , sdt = ? where id = ?', $data);
    }

    public function findSanChaById($data)
    {
        return DB::select('SELECT san_chas.* FROM san_chas where san_chas.id = ?', $data);
    }
}
