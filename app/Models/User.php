<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    
    protected $table = 'users';
    protected $fillable = [
        'role',
        'hoten',
        'email',
        'password',
    ];

    public function addUser($data){
        DB::insert('INSERT INTO users (role,hoten,email,password,acount,created_at) values (?, ?, ?, ?, ?,?)', $data);
    }

    public function checklogin($data){
        return DB::select('SELECT Password FROM users WHERE email = ? ', $data);
    }

    public function getAllUser(){
        return DB::select('SELECT * FROM users ORDER BY role ASC');
    }

    public function getUserById($data){
        return DB::select('SELECT * FROM users WHERE id = ?',$data);
    }

    public function getUserEmail($data){
        return DB::select('SELECT * FROM users WHERE email = ?',$data);
    }

    public function deleteById($data){
        DB::delete('DELETE FROM users WHERE id = ?', $data);
    }

    public function updateById($data){
        DB::update('UPDATE users SET hoten = ? , email = ? , role = ? where id = ?', $data);
    }
}
