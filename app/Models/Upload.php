<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    public $table="upload_file";
    
    public $timestamps = false;
    //  การกำหนดการเพิ่มข้อมูล   
    protected $fillable = ['Uploadfile','staffID'];
}
