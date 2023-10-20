<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $animals = ['kucing', 'ikan', 'sapi'];

    public function index()
    {
        # tampikan data animals
        echo "\n Menampilkan daftar nama hewan:";
        foreach ($this->animals as $animal) {
            echo "\n" . $animal;
        }
        // return json_encode($this->animals);
    }

    public function store(Request $request)
    {
        # menambahkan hewan baru
        echo "Store - Menambahkan nama hewan: $request->nama";
        array_push($this->animals, $request->nama);

        // memanggil method index untuk menampilkan daftar hewan
        $this->index();
    }

    public function update(Request $request, $id)
    {
        # mengupdate data hewan
        if (!isset($this->animals[$id])) {
            echo "id tidak ada";
        } else {
            $this->animals[$id] = $request->nama;
            echo "mengupdate hewan dengan id $id menjadi $request->nama";

            // memanggil method index untuk menampilkan daftar hewan
            $this->index();
        }
    }

    public function destroy($id)
    {
        if (!isset($this->animals[$id])) {
            echo "id tidak ada";
        } else {
            array_splice($this->animals, $id);
            echo "menghapus hewan dengan id $id";

            // memanggil method index untuk menampilkan daftar hewan
            $this->index();
        }
    }
}
