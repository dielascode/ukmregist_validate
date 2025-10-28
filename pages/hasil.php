<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Pendaftaran UKM</title>
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

    .result-container {
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
      margin-bottom: 25px;
      color: var(--text);
    }

    p {
      font-size: 15px;
      color: var(--text);
      margin-bottom: 12px;
      line-height: 1.5;
    }

    strong {
      color: var(--primary);
    }

    a {
      display: block;
      text-align: center;
      margin-top: 25px;
      background: var(--primary);
      color: white;
      text-decoration: none;
      font-weight: 600;
      padding: 12px 0;
      border-radius: 10px;
      transition: 0.3s;
    }

    a:hover {
      background: var(--primary-hover);
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(122, 71, 255, 0.3);
    }
  </style>
</head>
<body>

  <div class="result-container">
    <h2>Proses pendaftaran anda telah sukses dilakukan, silahkan tunggu konfirmasi dari admin</h2>
    <a href="form.php">← Kembali ke Form</a>
  </div>


</body>
</html>
