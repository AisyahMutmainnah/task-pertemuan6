<?php
#namespace utk mengelompokkan folder atau file
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index() #method index utk menampilkan data animals
    {
        echo "Menampilkan data animals";
    }

    public function store(Request $request)
    {
        echo "Menambahkan data animals baru - $request->nama"; #cara tangkap data ny pake - $request kmudian akses property nama nya pke tnda panah
    }

    public function update(Request $request, $id)
    {
        echo "Mengedit data hewan baru - id $id - $request->nama";
    }

    public function destroy($id)
    {
        echo "Menghapus data hewan - id $id";
    }
}
