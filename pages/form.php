<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran UKM</title>
  <style>
    :root {
      --primary: #7a47ff;
      --primary-hover: #6438e6;
      --background: #ece7fb;
      --text: #333;
      --white: #ffffff;
      --error: #e53935;
      --error-bg: #fdecea;
    }

    body {
      background-color: var(--background);
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-container {
      background: var(--white);
      padding: 40px 45px;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 430px;
      animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      text-align: center;
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 30px;
      color: var(--text);
    }

    label {
      display: block;
      font-weight: 500;
      font-size: 14px;
      color: var(--text);
      margin-bottom: 6px;
    }

    .input-wrapper {
      position: relative;
      margin-bottom: 22px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="date"] {
      width: 100%;
      padding: 12px 14px;
      border: 1.8px solid #ddd;
      border-radius: 10px;
      font-size: 14px;
      transition: all 0.3s ease;
      background-color: #fafafa;
    }

    input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(122, 71, 255, 0.15);
      outline: none;
      background-color: #fff;
    }

    .error-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--error);
      font-size: 18px;
      display: none;
    }

    .show-hide {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #777;
      font-size: 14px;
    }

    .error-msg {
      color: var(--error);
      font-size: 13px;
      margin-top: 4px;
      display: none;
    }

    .error-input {
      border-color: var(--error) !important;
      background-color: var(--error-bg) !important;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: var(--primary);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      letter-spacing: 0.3px;
      margin-top: 10px;
    }

    button:hover {
      background-color: var(--primary-hover);
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(122, 71, 255, 0.3);
    }

    ::placeholder {
      color: #aaa;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h2>Form Pendaftaran UKM</h2>

    <form id="registForm" novalidate>
      <div class="input-wrapper">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email kampus" required>
        <span class="error-icon">!</span>
        <div class="error-msg">Format email tidak valid</div>
      </div>

      <div class="input-wrapper">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
        <span class="error-icon">!</span>
        <div class="error-msg">Nama lengkap wajib diisi.</div>
      </div>

      <div class="input-wrapper">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        <span class="show-hide" id="togglePassword">👁️</span>
        <span class="error-icon">!</span>
        <div class="error-msg">Password wajib diisi</div>
      </div>

      <div class="input-wrapper">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        <span class="error-icon">!</span>
        <div class="error-msg">Tanggal lahir wajib diisi.</div>
      </div>

      <div class="input-wrapper">
        <label for="nomor_telepon">Nomor Telepon</label>
        <input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan nomor telepon" required>
        <span class="error-icon">!</span>
        <div class="error-msg">Nomor telepon wajib diisi.</div>
      </div>

      <button type="submit">Kirim Pendaftaran</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const form = document.getElementById("registForm");

    // 👁️ Tampilkan/sembunyikan password
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");
    togglePassword.addEventListener("click", () => {
      const isHidden = passwordField.type === "password";
      passwordField.type = isHidden ? "text" : "password";
      togglePassword.textContent = isHidden ? "🙈" : "👁️";
    });

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      // reset error tampilan
      document.querySelectorAll(".error-msg").forEach(e => e.style.display = "none");
      document.querySelectorAll(".error-icon").forEach(e => e.style.display = "none");
      document.querySelectorAll("input").forEach(e => e.classList.remove("error-input"));

      let valid = true;

      const email = form.email.value.trim();
      const nama = form.nama.value.trim();
      const password = form.password.value.trim();
      const tanggal_lahir = form.tanggal_lahir.value;
      const nomor_telepon = form.nomor_telepon.value.trim();

      function showError(id, msg) {
        const input = document.getElementById(id);
        const wrapper = input.parentElement;
        wrapper.querySelector(".error-msg").textContent = msg;
        wrapper.querySelector(".error-msg").style.display = "block";
        wrapper.querySelector(".error-icon").style.display = "block";
        input.classList.add("error-input");
      }

      // validasi dasar
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showError("email", "Format email tidak valid");
        valid = false;
      }

      if (nama.length < 2) {
        showError("nama", "Nama lengkap minimal 2 karakter.");
        valid = false;
      }

      if (password.length < 6) {
        showError("password", "Password minimal 6 karakter.");
        valid = false;
      }

      if (!tanggal_lahir) {
        showError("tanggal_lahir", "Tanggal lahir wajib diisi.");
        valid = false;
      } else {
        const dob = new Date(tanggal_lahir);
        const now = new Date();
        const age = now.getFullYear() - dob.getFullYear();
        if (age < 17 || (age === 17 && now < new Date(dob.setFullYear(now.getFullYear())))) {
          showError("tanggal_lahir", "Usia minimal 17 tahun.");
          valid = false;
        }
      }

      if (!/^[0-9]{10,15}$/.test(nomor_telepon)) {
        showError("nomor_telepon", "Nomor telepon harus 10–15 digit angka.");
        valid = false;
      }

      if (!valid) return;

      const formData = new FormData(form);

      try {
        const res = await fetch("proses_regist.php", { method: "POST", body: formData });
        const result = await res.json();

        if (result.success) {
          Swal.fire({
            icon: 'success',
            title: 'Pendaftaran Berhasil!',
            text: result.message,
            showConfirmButton: false,
            timer: 2000,
            background: '#fefcff',
            color: '#333'
          });
          form.reset();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: Object.values(result.errors).join(', '),
            confirmButtonColor: '#7a47ff'
          });
        }
      } catch (err) {
        console.error("Fetch error:", err);
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Terjadi kesalahan saat mengirim data.',
          confirmButtonColor: '#7a47ff'
        });
      }
    });
  </script>
</body>

</html>
