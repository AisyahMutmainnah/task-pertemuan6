<?php
# eloquent = cara kita utk berinteraksi dgn database
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); #nah ini klo pake eloquent tinggal pake all aja karena data nya di simpan di model

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];
        # $students = Student::getAllStudents(); #ini klo pake cara laravel biasa

        # var_dump($students); #klo dsni pake var_dump dia kliatan hasil nya tpi brupa array
        # echo json_encode($students);  # ini cara native / bawaan dari laravel  
        return response()->json($data, 200);  #nah klo ini kita ubah data dari array jadi json 
    }   #dan kita bisa masukin pramater kedua nya yaitu kode status nya200

    public function store(Request $request) #tangkap data = request
    {
        $student = Student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan

            /*'nama' => 'Aisyah',
            'nim' => '123456',
            'email' => 'aisyaem@gmail.com',
            'jurusan' => 'sistem informasi' */ #ini klo ketik manual d vscode
        ]); #menggunakan model student untuk insert data

        $data = [
            'messages' => 'Student is created',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    /*
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->update($request->all());

        $response = [
            'message' => 'Student has updated',
            'data' => $student
        ];

        return response()->json($response, 200);
    }
    */

    #method SHOW 

    public function show($id)
    {
        $student = Student::find($id);
        #echo $student;

        /*
       $data = [
            'message' => 'Get detail student',
            'data' => $student
        ];

        return response()->json($data, 200); */

        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not found',
            ];

            return response()->json($data, 404);
        }
    }

    #membuat method update

    public function update(Request $request, $id)
    {
        # echo $request->nama;
        # echo $id;

        # cara update data 
        # cari data yg ingin diupdate apakah ada atau tidak
        # jika ada, maka update datanya
        # jika tidak, maka munculkan pesan data not found

        $student = Student::find($id);

        if ($student) {
            $student->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jurusan' => $request->jurusan

                #kalau ingin mengupdate satu data aja 
                /*
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan 
                */
            ]);

            $data = [
                'message' => 'Data is updated',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not found',
            ];

            return response()->json($data, 404);
        }
    }

    #membuat mehod destroy
    public function destroy($id)
    {
        #cari id
        #jika ada, hapus data
        #jika tidak ada, kembalikan pesan data not found

        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Data is deleted'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data not found',
            ];

            return response()->json($data, 404);
        }
    }
}
