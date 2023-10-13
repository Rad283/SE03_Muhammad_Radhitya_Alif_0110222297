<?php

class animal
{
    public $hewan;

    public function __construct($daftar)
    {
        $this->hewan = $daftar;
    }

    public function index()
    {
        $num = 0;
        echo "<br>";
        echo "Menampilkan daftar hewan: <br>";
        foreach ($this->hewan as $x) {
            echo "- " . $x . "<br>";
            $num++;
        }
        echo "<br>";
    }

    public function store($tambah)
    {
        echo "Store - Menambahkan nama hewan: $tambah";
        array_push($this->hewan, $tambah);
        $this->index();
    }

    public function update($index, $update)
    {
        echo "Update - mengupdate hewan: " . $this->hewan[$index];
        $this->hewan[$index] = $update;
        echo ", menjadi: " . $this->hewan[$index];
        $this->index();
    }

    public function destroy($delete)
    {
        echo "Destroy - menghapus hewan: " . $this->hewan[$delete] . " di index " . $delete;
        array_splice($this->hewan, $delete);
        $this->index();
    }
}


$obj1 = new animal(['kucing', 'ayam', 'ikan']);
echo 'Index';
$obj1->index();
$obj1->store('kambing');
$obj1->update(3, 'kuda');
$obj1->destroy(3);
