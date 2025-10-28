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

    * {
      box-sizing: border-box;
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
    select {
      width: 100%;
      padding: 12px 14px;
      border: 1.8px solid #ddd;
      border-radius: 10px;
      font-size: 14px;
      transition: all 0.3s ease;
      background-color: #fafafa;
    }

    input:focus,
    select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(122, 71, 255, 0.15);
      outline: none;
      background-color: #fff;
    }

    select {
      appearance: none;
      background-image: url('data:image/svg+xml;utf8,<svg fill="%237a47ff" height="24" viewBox="0 0 24 24" width="24"><path d="M7 10l5 5 5-5z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 10px center;
      background-size: 18px;
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

    .radio-group {
      display: flex;
      gap: 20px;
      margin-bottom: 6px;
    }

    .radio-option {
      display: flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      font-size: 14px;
    }

    input[type="radio"] {
      appearance: none;
      width: 16px;
      height: 16px;
      border: 2px solid #bbb;
      border-radius: 50%;
      transition: all 0.3s ease;
      position: relative;
    }

    input[type="radio"]:checked {
      border-color: var(--primary);
      background-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(122, 71, 255, 0.15);
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
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
        <span class="error-icon">!</span>
        <div class="error-msg">NIM wajib diisi.</div>
      </div>

      <div class="input-wrapper">
        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>
        <span class="error-icon">!</span>
        <div class="error-msg">Jurusan wajib diisi.</div>
      </div>

      <div class="input-wrapper">
        <label for="prodi">Prodi</label>
        <input type="text" id="prodi" name="prodi" placeholder="Masukkan prodi" required>
        <span class="error-icon">!</span>
        <div class="error-msg">Prodi wajib diisi.</div>
      </div>

      <label>Jenis Kelamin</label>
      <div class="radio-group">
        <label class="radio-option">
          <input type="radio" name="gender" value="Laki-laki" required>
          <span>Laki-laki</span>
        </label>
        <label class="radio-option">
          <input type="radio" name="gender" value="Perempuan">
          <span>Perempuan</span>
        </label>
      </div>
      <div class="error-msg" id="gender-error">Pilih jenis kelamin.</div>

      <div class="input-wrapper">
        <label for="divisi">Divisi</label>
        <select id="divisi" name="divisi" required>
          <option selected disabled>Pilih Divisi</option>
          <option>Humas</option>
          <option>Media Kreatif</option>
          <option>Acara</option>
          <option>Administrasi</option>
        </select>
        <span class="error-icon">!</span>
        <div class="error-msg">Pilih divisi terlebih dahulu.</div>
      </div>

      <div class="input-wrapper">
        <label for="angkatan">Angkatan</label>
        <select id="angkatan" name="angkatan" required>
          <option selected disabled>Pilih Angkatan</option>
          <option>2024</option>
          <option>2025</option>
        </select>
        <span class="error-icon">!</span>
        <div class="error-msg">Pilih angkatan terlebih dahulu.</div>
      </div>

      <button type="submit">Kirim Pendaftaran</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const form = document.getElementById("registForm");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      // Reset semua error
      document.querySelectorAll(".error-msg").forEach(e => e.style.display = "none");
      document.querySelectorAll(".error-icon").forEach(e => e.style.display = "none");
      document.querySelectorAll("input, select").forEach(e => e.classList.remove("error-input"));

      let valid = true;

      function showError(id, msg) {
        const input = document.getElementById(id);
        const wrapper = input.parentElement;
        wrapper.querySelector(".error-msg").textContent = msg;
        wrapper.querySelector(".error-msg").style.display = "block";
        wrapper.querySelector(".error-icon").style.display = "block";
        input.classList.add("error-input");
      }

      const email = form.email.value.trim();
      const nama = form.nama.value.trim();
      const nim = form.nim.value.trim();
      const jurusan = form.jurusan.value.trim();
      const prodi = form.prodi.value.trim();
      const gender = form.querySelector('input[name="gender"]:checked');
      const divisi = form.divisi.value;
      const angkatan = form.angkatan.value;

      // Validasi input
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showError("email", "Format email tidak valid");
        valid = false;
      }
      if (nama.length < 2) {
        showError("nama", "Nama lengkap minimal 2 karakter.");
        valid = false;
      }
      if (!nim) {
        showError("nim", "NIM wajib diisi.");
        valid = false;
      }
      if (!jurusan) {
        showError("jurusan", "Jurusan wajib diisi.");
        valid = false;
      }
      if (!prodi) {
        showError("prodi", "Prodi wajib diisi.");
        valid = false;
      }
      if (!gender) {
        document.getElementById("gender-error").style.display = "block";
        valid = false;
      }
      if (divisi === "Pilih Divisi") {
        showError("divisi", "Silakan pilih divisi.");
        valid = false;
      }
      if (angkatan === "Pilih Angkatan") {
        showError("angkatan", "Silakan pilih angkatan.");
        valid = false;
      }

      if (!valid) return;

      // Jika valid, kirim data ke server
      const formData = new FormData(form);

      try {
        const res = await fetch("proses_regist.php", {
          method: "POST",
          body: formData
        });

        const result = await res.json();

        // ✅ Tampilkan alert sukses saja
        if (result.success) {
          Swal.fire({
            icon: 'success',
            title: 'Pendaftaran Berhasil!',
            text: result.message,
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            background: '#fefcff',
            color: '#333',
            confirmButtonColor: '#7a47ff'
          });
          form.reset();
        }

      } catch (err) {
        console.error(err);
      }
    });
  </script>
</body>

</html>
