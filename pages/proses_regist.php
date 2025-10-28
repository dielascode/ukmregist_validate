<?php
header('Content-Type: application/json');
include '../config/config.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email     = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $nama      = filter_var(trim($_POST['nama']), FILTER_SANITIZE_STRING);
    $nim       = filter_var(trim($_POST['nim']), FILTER_SANITIZE_NUMBER_INT);
    $jurusan   = filter_var(trim($_POST['jurusan']), FILTER_SANITIZE_STRING);
    $prodi     = filter_var(trim($_POST['prodi']), FILTER_SANITIZE_STRING);
    $gender    = filter_var(trim($_POST['gender']), FILTER_SANITIZE_STRING);
    $divisi    = filter_var(trim($_POST['divisi']), FILTER_SANITIZE_STRING);
    $angkatan  = filter_var(trim($_POST['angkatan']), FILTER_SANITIZE_NUMBER_INT);


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
