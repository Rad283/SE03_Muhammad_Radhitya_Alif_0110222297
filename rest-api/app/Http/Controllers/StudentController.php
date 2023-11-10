<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $profile = "Nama: Muhammad Radhitya Alif  NIM: 0110222297  SE03";

    public function index()
    {
        $students = Student::all();

        if ($students->isNotEmpty()) {
            # code...

            $data = [
                'profile' => $this->profile,
                'message' => 'Show all students data',
                'data' => $students,
            ];

            return response()->json($data);
        } else {
            $data = [
                'profile' => $this->profile,
                'message' => 'data is empty',
                'data' => $students,
            ];
            return response()->json($data);
        }
    }

    public function post(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'jurusan' => 'required'
        ];

        $validated = $request->validate($rules);

        $students = Student::create($validated);
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

        $rules = [
            'nama' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|email',
            'jurusan' => 'required'
        ];

        $validated = $request->validate($rules);

        if ($student) {
            # menangkap data request
            $input = [
                'nama' => $validated['nama'] ?? $student->nama,
                'nim' => $validated['nim'] ?? $student->nim,
                'email' => $validated['email'] ?? $student->email,
                'jurusan' => $validated['jurusan'] ?? $student->jurusan
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
        } else {

            $data = [
                'profile' => $this->profile,
                'message' => 'Update - Student id not found',
            ];

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
    public function show($id)
    {
        # cari id student yang ingin didapatkan
        $student = Student::find($id);
        if ($student) {
            $data = [
                'message' => 'Get detail student',
                'data' => $student,
            ];
            # mengembalikan data (json) dan kode 200|
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
            # mengembalikan data (json) dan kode 404
            return response()->json($data, 404);
        }
    }
}
