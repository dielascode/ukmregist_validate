<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email     = trim($_POST['email']);
    $nama      = trim($_POST['nama']);
    $nim       = trim($_POST['nim']);
    $jurusan   = trim($_POST['jurusan']);
    $prodi     = trim($_POST['prodi']);
    $gender    = trim($_POST['gender']);
    $divisi    = trim($_POST['divisi']);
    $angkatan  = trim($_POST['angkatan']);

    if (empty($email)) {
        $errors['email'] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    if (empty($nama)) {
        $errors['nama'] = "Nama harus diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi.";
    }

    if (empty($nim)) {
        $errors['nim'] = "NIM harus diisi.";
    } elseif (!is_numeric($nim)) {
        $errors['nim'] = "NIM harus berupa angka.";
    }

    if (empty($jurusan)) {
        $errors['jurusan'] = "Jurusan harus dipilih.";
    }

    if (empty($prodi)) {
        $errors['prodi'] = "Program studi harus diisi.";
    }

    if (empty($gender)) {
        $errors['gender'] = "Jenis kelamin harus dipilih.";
    }

    if (empty($divisi)) {
        $errors['divisi'] = "Divisi harus diisi.";
    }

    if (empty($angkatan)) {
        $errors['angkatan'] = "Angkatan harus diisi.";
    } elseif (!is_numeric($angkatan) || strlen($angkatan) != 4) {
        $errors['angkatan'] = "Angkatan harus berupa tahun (contoh: 2024).";
    }

    if (empty($errors)) {
        $query = "INSERT INTO form (email, nama, nim, jurusan, prodi, gender, divisi, angkatan)
                  VALUES ('$email', '$nama', '$nim', '$jurusan', '$prodi', '$gender', '$divisi', '$angkatan')";

        if (mysqli_query($conn, $query)) {
            header("Location: hasil.php");
            exit();
        } else {
            echo "<h3 style='color:red;'>Gagal menyimpan data: " . mysqli_error($conn) . "</h3>";
        }
    } else {
        echo "<ul style='color:red;'>";
        foreach ($errors as $field => $message) {
            echo "<li><strong>" . ucfirst($field) . ":</strong> $message</li>";
        }
        echo "</ul>";
    }
} else {
    echo "<h3>Tidak ada data yang dikirim.</h3>";
}
?>
