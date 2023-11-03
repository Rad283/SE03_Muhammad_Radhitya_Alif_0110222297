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
        $student = Student::find($id);
        if ($student) {
            # menangkap data request
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];
            # melakukan update data
            $student->update($input);
            $data = [
                'profile' => $this->profile,
                'message' => 'Student is updated',
                'data' => $student
            ];
            # mengembalikan data (json) dan kode 200
            return response()->json($data, 200);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            $data = [
                'profile' => $this->profile,
                'message' => 'menghapus data dengan id ' . $id
            ];

            return response()->json($data);
        } else {
            $data = [
                'profile' => $this->profile,
                'message' => 'Delete - Id tidak ditemukan'
            ];
            return response()->json($data);
        }
    }
}
