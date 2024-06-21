<?php
session_start();

// Hapus semua data session jika tombol reset diklik
if (isset($_POST['reset'])) {
    unset($_SESSION['names']);
    unset($_SESSION['kata_kunci']);
    header("Location: index.php");
    exit();
}

// Inisialisasi session jika belum ada
if (!isset($_SESSION['names'])) {
    $_SESSION['names'] = array();
}
if (!isset($_SESSION['kata_kunci'])) {
    $_SESSION['kata_kunci'] = array();
}

// Ambil nilai input nama dari form jika disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    // Simpan nama ke dalam session array
    $_SESSION['names'][] = $nama;

    // Kata-kata tertentu yang ingin ditampilkan setelah menyimpan nama
    $kata_kunci_pilihan = array(
        '🌟gagang panto🌟', 
        '🌟tahu bulat🌟', 
        '🌟kresek alfamart🌟',
        '🌟asep spakbor🌟',
        '🌟jajang knalpot🌟',
        '🌟Tuyul Mullet🌟',
        '🌟kangkung ponorogo🌟',
        '🌟singa pedelpop🌟',
        '🌟Remote AC🌟'
    );

    // Pilih secara acak satu kata kunci dari $kata_kunci_pilihan
    $kata_kunci_acak = array_rand($kata_kunci_pilihan, 1);
    $kata_kunci = array($kata_kunci_pilihan[$kata_kunci_acak]);

    // Simpan kata-kata tertentu untuk nama yang baru disimpan
    $_SESSION['kata_kunci'][$nama] = $kata_kunci;
    $_SESSION['last_nama'] = $nama;

    header("Location: index.php");
    exit();
}
?>