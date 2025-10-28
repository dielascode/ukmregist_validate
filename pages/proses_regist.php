<?php
header('Content-Type: application/json');
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

    // Validasi
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

    if (empty($jurusan)) $errors['jurusan'] = "Jurusan harus diisi.";
    if (empty($prodi)) $errors['prodi'] = "Program studi harus diisi.";
    if (empty($gender)) $errors['gender'] = "Jenis kelamin harus dipilih.";
    if (empty($divisi)) $errors['divisi'] = "Divisi harus diisi.";

    if (empty($angkatan)) {
        $errors['angkatan'] = "Angkatan harus diisi.";
    } elseif (!is_numeric($angkatan) || strlen($angkatan) != 4) {
        $errors['angkatan'] = "Angkatan harus berupa tahun (contoh: 2024).";
    }

    // Jika tidak ada error
    if (empty($errors)) {
        $query = "INSERT INTO form (email, nama, nim, jurusan, prodi, gender, divisi, angkatan)
                  VALUES ('$email', '$nama', '$nim', '$jurusan', '$prodi', '$gender', '$divisi', '$angkatan')";

        if (mysqli_query($conn, $query)) {
            echo json_encode(["success" => true, "message" => "Data berhasil disimpan."]);
        } else {
            echo json_encode(["success" => false, "errors" => ["database" => "Gagal menyimpan ke database: " . mysqli_error($conn)]]);
        }
    } else {
        echo json_encode(["success" => false, "errors" => $errors]);
    }
}
?>
