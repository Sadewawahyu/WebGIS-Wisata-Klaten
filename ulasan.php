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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ulasan Pengunjung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding-top: 100px; /* Adjust for fixed header */
        }

        header {
            background: linear-gradient(135deg, #2d6a4f, #40916c);
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            height: 70px;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            font-size: 28px;
            font-weight: 600;
        }

        header nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 400;
            transition: all 0.3s ease;
        }

        header nav ul li a:hover {
            color: #d8f3dc;
            transform: scale(1.05);
        }

        

        h1 {
            text-align: center;
            font-size: 36px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-button {
            background-color: #2d6a4f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #40916c;
        }

        .ulasan-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            padding: 25px;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
        }

        .card h3 {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #2d6a4f;
            border-bottom: 2px solid #40916c;
            padding-bottom: 5px;
        }

        .card p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
        }

        .rating {
            font-weight: bold;
            color: #f39c12;
            font-size: 18px;
        }

        .no-data {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #e63946;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Explore Klaten</div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
            </ul>
        </nav>
    </header>

    <h1>Data Ulasan Pengunjung</h1>

    <div class="button-container">
        <a href="tambah_ulasan.php" class="add-button">Tambah Ulasan Baru</a>
    </div>

    <?php
    $sql = "SELECT id, nama_pengunjung, nama_tempat, rating, ulasan, tanggal_kunjungan 
            FROM ulasan_pengunjung 
            ORDER BY tanggal_kunjungan DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='ulasan-container'>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<h3>" . htmlspecialchars($row['nama_pengunjung']) . "</h3>";
            echo "<p><strong>Tempat:</strong> " . htmlspecialchars($row['nama_tempat']) . "</p>";
            echo "<p class='rating'><strong>Rating:</strong> " . htmlspecialchars($row['rating']) . " / 5</p>";
            echo "<p><strong>Ulasan:</strong> " . htmlspecialchars($row['ulasan']) . "</p>";
            echo "<p><strong>Tanggal Kunjungan:</strong> " . htmlspecialchars($row['tanggal_kunjungan']) . "</p>";
            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "<p class='no-data'>Tidak ada data ulasan pengunjung!</p>";
    }

    $conn->close();
    ?>
</body>
</html>
