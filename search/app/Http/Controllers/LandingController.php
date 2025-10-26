<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LandingController extends Controller
{
    // SEARCH
    public function search(Request $request)
    {
        // Mendapatkan input dari request
        $query = $request->input('q', ''); // Default ke string kosong jika tidak ada input
        $rank = $request->input('rank');
        $category = $request->input('category', ''); // Default ke string kosong jika tidak ada input

        // Validasi input (minimal satu input harus diisi)
        if (empty($query) && empty($category)) {
            return response()->json(['error' => 'Masukkan kata kunci pencarian atau pilih kategori.'], 400);
        }

        // Menjalankan proses Python dengan menggunakan Symfony Process component
        $process = new Process(
            ['py', 'query.py', 'indexdb', $rank, $query, $category],
            null,
            ['SYSTEMROOT' => getenv('SYSTEMROOT'), 'PATH' => getenv("PATH")]
        );
        $process->run();

        // Mengecek apakah proses berhasil
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Memproses output dari script Python
        $list_data = array_filter(explode("\n", $process->getOutput()));
        $data = [];

        // Fungsi untuk membatasi jumlah kata
        function limit_words($text, $limit)
        {
            $words = explode(' ', $text);
            if (count($words) > $limit) {
                $text = implode(' ', array_slice($words, 0, $limit)) . '...';
            }
            return $text;
        }

        // Mengonversi setiap baris output menjadi array dan mempersiapkan HTML
        foreach ($list_data as $item) {
            $dataj = json_decode($item, true);

            // Memastikan setiap kunci ada sebelum digunakan
            $url = $dataj['url'] ?? '#';
            $judul = $dataj['title'] ?? 'Judul tidak tersedia';
            $tanggal = $dataj['tanggal'] ?? 'Tanggal tidak tersedia';
            $kelas = $dataj['kelas'] ?? 'Kategori tidak tersedia';
            $score = $dataj['score'] ?? 'Score tidak tersedia';
            $gambar = $dataj['image'] ?? 'Img tidak tersedia';
            $kategori = $dataj['category'] ?? 'Category tidak tersedia';
            $content = limit_words($dataj['content'] ?? 'Content tidak tersedia', 50);

            // Mempersiapkan HTML untuk setiap item data
            $data[] = '
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100">
                    <a target="_blank" href="' . $url . '" class="img-link">
                        <img src="' . $gambar . '" class="card-img-top" alt="Gambar Berita">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a target="_blank" href="' . $url . '">' . $judul . '</a></h5>
                        <p class="card-text">' . $content . '</p>
                        <hr>
                        <p class="card-text">Tanggal: ' . $tanggal . ' WIB</p>
                        <p class="card-text">Kategori: ' . $kategori . '</p>
                        <p class="card-text">Score: ' . $score . '</p>
                    </div>
                </div>
            </div>';
        }

        // Mengirimkan data sebagai JSON
        return response()->json($data);
    }
}