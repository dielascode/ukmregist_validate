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
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
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

    input[type="text"],
    input[type="email"],
    select {
      width: 100%;
      padding: 12px 14px;
      border: 1.8px solid #ddd;
      border-radius: 10px;
      font-size: 14px;
      margin-bottom: 20px;
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

    /* Radio button container */
    .radio-group {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
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

    input[type="radio"]:focus {
      outline: none;
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

    @media (max-width: 480px) {
      .form-container {
        padding: 30px 25px;
      }

      h2 {
        font-size: 18px;
        margin-bottom: 25px;
      }

      input,
      select {
        font-size: 13px;
      }

      button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Form Pendaftaran UKM</h2>

    <form>
      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Masukkan email kampus" required>

      <label for="nama">Nama Lengkap</label>
      <input type="text" id="nama" placeholder="Masukkan nama lengkap" required>

      <label for="nim">NIM</label>
      <input type="text" id="nim" placeholder="Masukkan NIM" required>

      <label for="jurusan">Jurusan</label>
      <input type="text" id="jurusan" placeholder="Masukkan jurusan" required>

      <label for="prodi">Prodi</label>
      <input type="text" id="prodi" placeholder="Masukkan prodi" required>

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

      <label for="divisi">Divisi</label>
      <select id="divisi" required>
        <option selected disabled>Pilih Divisi</option>
        <option>Humas</option>
        <option>Media Kreatif</option>
        <option>Acara</option>
        <option>Administrasi</option>
      </select>

      <label for="angkatan">Angkatan</label>
      <select id="angkatan" required>
        <option selected disabled>Pilih Angkatan</option>
        <option>2024</option>
        <option>2025</option>
      </select>

      <button type="submit">Kirim Pendaftaran</button>
    </form>
  </div>

</body>
</html>
