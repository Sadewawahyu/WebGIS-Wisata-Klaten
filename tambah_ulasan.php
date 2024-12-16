<?php
// Koneksi ke database
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "dbulasan";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pengunjung  = htmlspecialchars($_POST['nama_pengunjung']);
    $nama_tempat      = htmlspecialchars($_POST['nama_tempat']);
    $rating           = intval($_POST['rating']);
    $ulasan           = htmlspecialchars($_POST['ulasan']);
    $tanggal_kunjungan = htmlspecialchars($_POST['tanggal_kunjungan']);

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO ulasan_pengunjung (nama_pengunjung, nama_tempat, rating, ulasan, tanggal_kunjungan) 
            VALUES ('$nama_pengunjung', '$nama_tempat', '$rating', '$ulasan', '$tanggal_kunjungan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Ulasan berhasil ditambahkan!'); window.location.href='ulasan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ulasan Baru</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #2d6a4f;
            font-size: 28px;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }

        form input,
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        form textarea {
            resize: vertical;
            height: 120px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #52b788, #2d6a4f);
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
            display: block;
            width: 100%;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #40916c, #2d6a4f);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #2d6a4f;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Ulasan Baru</h1>
        <form method="POST" action="tambah_ulasan.php">
            <label for="nama_pengunjung">Nama Pengunjung</label>
            <input type="text" name="nama_pengunjung" id="nama_pengunjung" placeholder="Masukkan nama Anda" required>

            <label for="nama_tempat">Nama Tempat</label>
            <input type="text" name="nama_tempat" id="nama_tempat" placeholder="Contoh: Candi Plaosan" required>

            <label for="rating">Rating</label>
            <select name="rating" id="rating" required>
                <option value="" disabled selected>Pilih rating</option>
                <option value="1">1 - Sangat Buruk</option>
                <option value="2">2 - Buruk</option>
                <option value="3">3 - Cukup</option>
                <option value="4">4 - Baik</option>
                <option value="5">5 - Sangat Baik</option>
            </select>

            <label for="ulasan">Ulasan</label>
            <textarea name="ulasan" id="ulasan" placeholder="Tulis ulasan Anda di sini" required></textarea>

            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" required>

            <button type="submit" class="btn-submit">Kirim Ulasan</button>
        </form>

        <a href="ulasan.php" class="back-link">Kembali ke Halaman Ulasan</a>
    </div>
</body>
</html>
