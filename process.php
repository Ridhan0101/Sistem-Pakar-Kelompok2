<?php
class ExpertSystem
{
    private $facts = [];
    private $rules = [];

    public function __construct()
    {
        $this->initializeRules();
    }

    private function initializeRules()
    {
        $this->rules = [
            [
                'conditions' => ['sumber_daya' => 'siap', 'permintaan_pasar' => 'tinggi', 'keuntungan' => 'besar'],
                'result' => ['keputusan' => 'ekspansi cabang luar kota'],
                'cf' => 0.9
            ],
            [
                'conditions' => ['sumber_daya' => 'siap', 'permintaan_pasar' => 'tinggi', 'keuntungan' => 'sedang'],
                'result' => ['keputusan' => 'ekspansi cabang dalam kota'],
                'cf' => 0.7
            ],
            [
                'conditions' => ['sumber_daya' => 'siap', 'permintaan_pasar' => 'tinggi', 'keuntungan' => 'kecil'],
                'result' => ['keputusan' => 'distribusi ke swalayan'],
                'cf' => 0.5
            ],
            [
                'conditions' => ['sumber_daya' => 'siap', 'permintaan_pasar' => 'rendah'],
                'result' => ['keputusan' => 'distribusi ke swalayan'],
                'cf' => 0.6
            ],
            [
                'conditions' => ['sumber_daya' => 'tidak_siap'],
                'result' => ['keputusan' => 'tidak ekspansi'],
                'cf' => 1.0
            ],
            [
                'conditions' => ['kepuasan_pelanggan' => 'ya', 'pesaing' => 'ada'],
                'result' => ['permintaan_pasar' => 'rendah'],
                'cf' => 0.8
            ],
            [
                'conditions' => ['kepuasan_pelanggan' => 'ya', 'pesaing' => 'tidak_ada'],
                'result' => ['permintaan_pasar' => 'tinggi'],
                'cf' => 0.9
            ],
            [
                'conditions' => ['kepuasan_pelanggan' => 'tidak'],
                'result' => ['permintaan_pasar' => 'rendah'],
                'cf' => 1.0
            ],
            [
                'conditions' => ['ketersediaan_karyawan' => 'ya', 'ketersediaan_stok' => 'ya'],
                'result' => ['sumber_daya' => 'siap'],
                'cf' => 0.9
            ],
            [
                'conditions' => ['ketersediaan_karyawan' => 'ya', 'ketersediaan_stok' => 'tidak'],
                'result' => ['sumber_daya' => 'tidak_siap'],
                'cf' => 0.7
            ],
            [
                'conditions' => ['ketersediaan_karyawan' => 'tidak'],
                'result' => ['sumber_daya' => 'tidak_siap'],
                'cf' => 1.0
            ]
        ];
    }

    public function addFact($fact, $value)
    {
        $this->facts[$fact] = [
            'value' => $value,
            'cf' => 1.0  // Default confidence factor untuk fakta input
        ];
    }

    public function forwardChaining()
    {
        $newFacts = true;
        while ($newFacts) {
            $newFacts = false;
            foreach ($this->rules as $rule) {
                if ($this->evaluateConditions($rule['conditions'])) {
                    foreach ($rule['result'] as $key => $value) {
                        if (!isset($this->facts[$key])) {
                            $this->facts[$key] = [
                                'value' => $value,
                                'cf' => $rule['cf']
                            ];
                            $newFacts = true;
                        } else {
                            $this->facts[$key]['cf'] = $this->combineCF($this->facts[$key]['cf'], $rule['cf']);
                        }
                    }
                }
            }
        }
        return $this->facts;
    }

    private function evaluateConditions($conditions)
    {
        foreach ($conditions as $key => $value) {
            if (!isset($this->facts[$key]) || $this->facts[$key]['value'] != $value) {
                return false;
            }
        }
        return true;
    }

    private function combineCF($cf1, $cf2)
    {
        return $cf1 + $cf2 * (1 - $cf1);
    }
}

$expertSystem = new ExpertSystem();

// Menambahkan fakta berdasarkan input dari formulir
$expertSystem->addFact('kepuasan_pelanggan', $_POST['kepuasan_pelanggan']);
$expertSystem->addFact('pesaing', $_POST['pesaing']);
$expertSystem->addFact('ketersediaan_karyawan', $_POST['ketersediaan_karyawan']);
$expertSystem->addFact('ketersediaan_stok', $_POST['ketersediaan_stok']);
$expertSystem->addFact('keuntungan', $_POST['keuntungan']);

// Melakukan forward chaining
$result = $expertSystem->forwardChaining();

// Menampilkan hasil
$keputusan = isset($result['keputusan']) ? $result['keputusan']['value'] : 'Tidak ada keputusan yang dapat diambil';
$cf = isset($result['keputusan']) ? $result['keputusan']['cf'] : 0;
$cf_percentage = $cf * 100; // Ubah ke dalam persentase

?>

<!DOCTYPE html>
<html lang="en">
<?php require "layout/head.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Prediksi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container card p-4">
        <h2 style="text-align: center;">Hasil Prediksi</h2>
        <hr>

        <?php
        // Menampilkan hasil
        if (isset($result['keputusan'])) {
            echo "<p>Keputusan: <strong>" . $result['keputusan']['value'] . "</strong></p>";
            echo "<p>Tingkat Kepercayaan: <strong>" . ($result['keputusan']['cf'] * 100) . "%</strong></p>";
        } else {
            echo "<p>Tidak ada keputusan yang dapat diambil</p>";
        }
        ?>
        <button onclick="location.href='index.php';"  class="btn btn-primary mt-2">Kembali</button>

        
    </div>
</body>

</html>