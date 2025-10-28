<?php
header('Content-Type: application/json');
include '../config/config.php';

// tampilkan error PHP dalam JSON biar gampang debug
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    echo json_encode([
        "success" => false,
        "error_type" => "PHP Error",
        "message" => $errstr,
        "file" => $errfile,
        "line" => $errline
    ]);
    exit;
});
set_exception_handler(function($e) {
    echo json_encode([
        "success" => false,
        "error_type" => "Exception",
        "message" => $e->getMessage()
    ]);
    exit;
});

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email          = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $nama           = mysqli_real_escape_string($conn, trim($_POST['nama'] ?? ''));
    $password       = $_POST['password'];
    $tanggal_lahir  = trim($_POST['tanggal_lahir'] ?? '');
    $nomor_telepon  = mysqli_real_escape_string($conn, trim($_POST['nomor_telepon'] ?? ''));

    // Validasi
    if (empty($email)) {
        $errors['email'] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    if (empty($nama)) {
        $errors['nama'] = "Nama lengkap wajib diisi.";
    }

    if (empty($password)) {
        $errors['password'] = "Password wajib diisi.";
    }

    if (empty($tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi.";
    }

    if (empty($nomor_telepon)) {
        $errors['nomor_telepon'] = "Nomor telepon wajib diisi.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn, "INSERT INTO form2 (email, nama, password, tanggal_lahir, nomor_telepon) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssss", $email, $nama, $hashed_password, $tanggal_lahir, $nomor_telepon);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssss", $email, $nama, $hashed_password, $tanggal_lahir, $nomor_telepon);

            if (mysqli_stmt_execute($stmt)) {
                echo json_encode(["success" => true, "message" => "Data berhasil disimpan."]);
            } else {
                echo json_encode(["success" => false, "error_type" => "Database", "message" => mysqli_error($conn)]);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(["success" => false, "error_type" => "Database", "message" => "Query gagal disiapkan."]);
        }
    } else {
        echo json_encode(["success" => false, "errors" => $errors]);
    }
}
