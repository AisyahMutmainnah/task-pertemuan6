<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'email', 'jurusan'];
    /* static function getAllStudents() #static supaya bisa manggil method tnpa buat object
    {
        // query select sql
        $students = DB::select('select * from students');
        return $students;
    } */
}
