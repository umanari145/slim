<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

//Model内ですでに接続情報が共有されている
class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name','email'];
}
