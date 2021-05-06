<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameD extends Model
{
    use HasFactory;
    public $table="db_d";
    
    public $timestamps = false;
    //  การกำหนดการเพิ่มข้อมูล   
    protected $fillable = ['Name_D'];
}
