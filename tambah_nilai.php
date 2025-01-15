<?php
include 'koneksi.php';

if (isset($_GET['id_mapel'])) {
    $id_mapel = $_GET['id_mapel'];

    $mapel_query = "SELECT * FROM mapel WHERE id_mapel = $id_mapel";
    $mapel_result = $conn->query($mapel_query);

    if ($mapel_result->num_rows > 0) {
        $mapel = $mapel_result->fetch_assoc();
    } else {
        echo "<script>alert('Mata pelajaran tidak ditemukan!'); window.location='nilai.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID mata pelajaran tidak ditemukan!'); window.location='nilai.php';</script>";
    exit;
}

$siswa_query = "SELECT * FROM siswa";
$siswa_result = $conn->query($siswa_query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa = $_POST['id_siswa'];
    $tugas = $_POST['tugas'];
    $uh = $_POST['uh'];
    $pts = $_POST['pts'];
    $uas = $_POST['uas'];

    $insert_query = "INSERT INTO nilai (id_siswa, id_mapel, tugas, uh, pts, uas)
                     VALUES ('$id_siswa', '$id_mapel', '$tugas', '$uh', '$pts', '$uas')";
                     
    if ($conn->query($insert_query) === TRUE) {
        echo "<script>alert('Rekap nilai berhasil ditambahkan!'); window.location='nilai.php?mapel_id=$mapel_id';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan nilai: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 98%;
            z-index: 1000;
            background-color: #001f3f;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: slideDown 1.2s ease-out;
        }

        header h1 {
            margin: 0;
            font-size: 1.8rem;
            letter-spacing: 1px;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 1.5rem;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        header nav ul li a:hover {
            color: #001f3f;
            background-color: rgb(255, 255, 255);
            border-color: white;
        }

        main {
            padding: 8rem 2rem 2rem;
            opacity: 1;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
            transform: translateY(0);
        }

        main.slide-down {
            transform: translateY(100%);
            opacity: 0;
        }

        main h1 {
            color: #001f3f;
            animation: fadeInUp 1.5s ease-in-out;
        }

        .data {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1.5s ease-in-out;
            animation-delay: 1s;
            animation-fill-mode: both;
        }

        .data table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .data table th,
        .data table td {
            padding: 0.8rem;
            text-align: center;
            border: 1px solid #ddd;
        }

        .data table th {
            background-color: #001f3f;
            color: white;
            font-size: 1rem;
            animation: slideInFromSides 1.5s ease-out;
            animation-delay: 2s;
            animation-fill-mode: both;
        }

        .data table tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease-in-out;
        }

        .data table tr td {
            font-weight: bold;
            color: #333333;
            margin-bottom: 5px;
        }

        .data table tr td input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .data table tr td input:focus,
        select:focus {
            border-color: #001f3f;
            box-shadow: 0 0 8px rgba(0, 31, 63, 0.5);
            outline: none;
        }

        button {
            width: 100%;
            background-color: #001f3f;
            color: #ffffff;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #004080;
            transform: scale(1.01);
        }

        button:active {
            background-color: #003060;
            transform: scale(1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

    </style>
</head>

<body>
    <header>
        <h1>Dashboard Guru</h1>
        <nav>
            <ul>
            <li><a href="mapel.php">Mapel</a></li>
                <li><a href="nilai.php">Nilai</a></li>
                <li><a href="siswa.php">Siswa</a></li>
                <li><a href="login.php">Keluar</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Tambah Nilai Mapel <?= $mapel['nama_mapel']; ?></h1>
        <div class="data">
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Pilih Siswa:</td>
                        <td>
                            <select name="id_siswa" required>
                                <option value="">-- Pilih Siswa --</option>
                                <?php while ($siswa = $siswa_result->fetch_assoc()) { ?>
                                    <option value="<?= $siswa['id_siswa']; ?>">
                                        <?= $siswa['absen'] . " - " . $siswa['nama_siswa']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nilai Tugas:</td>
                        <td><input type="number" name="tugas" min="0" max="100" required></td>
                    </tr>
                    <tr>
                        <td>Nilai UH:</td>
                        <td><input type="number" name="uh" min="0" max="100" required></td>
                    </tr>
                    <tr>
                        <td>Nilai PTS:</td>
                        <td><input type="number" name="pts" min="0" max="100" required></td>
                    </tr>
                    <tr>
                        <td>Nilai UAS:</td>
                        <td><input type="number" name="uas" min="0" max="100" required></td>
                    </tr>
                </table>
                <button type="submit">Simpan Nilai</button>
            </form>
        </div>
    </main>
    
</body>

</html>