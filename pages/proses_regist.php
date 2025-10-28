<?php
header('Content-Type: application/json');
include '../config/config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email          = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $nama           = filter_var(trim($_POST['nama'] ?? ''), FILTER_SANITIZE_STRING);
    $password       = trim($_POST['password'] ?? '');
    $tanggal_lahir  = trim($_POST['tanggal_lahir'] ?? '');
    $nomor_telepon  = filter_var(trim($_POST['nomor_telepon'] ?? ''), FILTER_SANITIZE_STRING);

    if (empty($email)) {
        $errors['email'] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    if (empty($nama)) {
        $errors['nama'] = "Nama lengkap wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s'.-]+$/u", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi.";
    }

    if (empty($password)) {
        $errors['password'] = "Password wajib diisi.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password minimal 6 karakter.";
    }

    if (empty($tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Format tanggal tidak valid (YYYY-MM-DD).";
    }

    if (empty($nomor_telepon)) {
        $errors['nomor_telepon'] = "Nomor telepon wajib diisi.";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $nomor_telepon)) {
        $errors['nomor_telepon'] = "Nomor telepon harus 10–15 digit angka.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO form (email, nama, password, tanggal_lahir, nomor_telepon)
                  VALUES ('$email', '$nama', '$hashed_password', '$tanggal_lahir', '$nomor_telepon')";

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
