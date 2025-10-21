<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/config.php';

if (isset($_POST['submit'])) {
    $email     = $_POST['email'];
    $nama      = $_POST['nama'];
    $nim       = $_POST['nim'];
    $jurusan   = $_POST['jurusan'];
    $prodi     = $_POST['prodi'];
    $gender    = $_POST['gender'];
    $divisi    = $_POST['divisi'];
    $angkatan  = $_POST['angkatan'];

    $query = "INSERT INTO form (email, nama, nim, jurusan, prodi, gender, divisi, angkatan)
              VALUES ('$email', '$nama', '$nim', '$jurusan', '$prodi', '$gender', '$divisi', '$angkatan')";

    if (mysqli_query($conn, $query)) {
        echo "<h3 style='color: green;'>sukses</h3> " . mysqli_error($conn);
    } else {
        echo "<h3 style='color: red;'>gagal</h3> " . mysqli_error($conn);
    }
} else {
    echo "<h3>Tidak ada data yang dikirim.</h3>";
}
?>
