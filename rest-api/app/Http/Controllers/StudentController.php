<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $profile = "Nama: Muhammad Radhitya Alif  NIM: 0110222297  SE03";
    public function index()
    {
        $students = Student::all();

        $data = [
            'profile' => $this->profile,
            'message' => 'Show all students data',
            'data' => $students,
        ];

        return response()->json($data);
    }

    public function post(Request $request)
    {
        $students = Student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ]);
        $data = [
            'profile' => $this->profile,
            'message' => 'Berhasil menambahkan',
            'data' => $students
        ];
        return response()->json($data);
    }

    public function put(Request $request, $id)
    {
        $students = Student::find($id);
        $students->nama = $request->nama;
        $students->nim = $request->nim;
        $students->email = $request->email;
        $students->jurusan = $request->jurusan;
        $students->save();
        $data = [
            'profile' => $this->profile,
            'message' => 'berhasil mengupdate data dengan id ' . $id,
            'data' => $request->all()
        ];

        return response()->json($data);
    }

    public function destroy($id)
    {
        $students = Student::find($id);
        $students->delete();
        $data = [
            'profile' => $this->profile,
            'message' => 'menghapus data dengan id ' . $id
        ];

        return response()->json($data);
    }
}
