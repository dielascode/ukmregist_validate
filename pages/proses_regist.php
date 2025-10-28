<?php
header('Content-Type: application/json');
include '../config/config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sanitize input
    $email          = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $nama           = mysqli_real_escape_string($conn, trim($_POST['nama'] ?? ''));
    $password       = trim($_POST['password'] ?? '');
    $tanggal_lahir  = trim($_POST['tanggal_lahir'] ?? '');
    $nomor_telepon  = mysqli_real_escape_string($conn, trim($_POST['nomor_telepon'] ?? ''));

    // email
    if (empty($email)) {
        $errors['email'] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    // nama
    if (empty($nama)) {
        $errors['nama'] = "Nama lengkap wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s'.-]+$/u", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi.";
    }

    // password
    if (empty($password)) {
        $errors['password'] = "Password wajib diisi.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password minimal 6 karakter.";
    }

    // tanggal lahir
    if (empty($tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Format tanggal tidak valid (YYYY-MM-DD).";
    } else {
        $dob = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);
        $now = new DateTime();
        if (!$dob) {
            $errors['tanggal_lahir'] = "Format tanggal tidak valid (YYYY-MM-DD).";
        } else {
            $age = $dob->diff($now)->y;
            if ($age < 17) {
                $errors['tanggal_lahir'] = "Anda harus berusia minimal 17 tahun.";
            }
        }
    }

    // nomor telepon
    if (empty($nomor_telepon)) {
        $errors['nomor_telepon'] = "Nomor telepon wajib diisi.";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $nomor_telepon)) {
        $errors['nomor_telepon'] = "Nomor telepon harus 10–15 digit angka.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // gunakan prepared statement untuk keamanan lebih baik
        $stmt = mysqli_prepare($conn, "INSERT INTO form (email, nama, password, tanggal_lahir, nomor_telepon) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $email, $nama, $hashed_password, $tanggal_lahir, $nomor_telepon);
            if (mysqli_stmt_execute($stmt)) {
                echo json_encode(["success" => true, "message" => "Data berhasil disimpan."]);
            } else {
                echo json_encode(["success" => false, "errors" => ["database" => "Gagal menyimpan ke database."]]);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(["success" => false, "errors" => ["database" => "Gagal mempersiapkan query."]]);
        }
    } else {
        echo json_encode(["success" => false, "errors" => $errors]);
    }
}
?>
