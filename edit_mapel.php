<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi.php';

    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $nama_guru = $_POST['nama_guru'];

    mysqli_query($conn, "UPDATE mapel SET nama_mapel='$nama_mapel', nama_guru='$nama_guru' where id_mapel='$id_mapel'");

    echo "<script>alert('Data mapel berhasil diperbarui!'); window.location='mapel.php';</script>";
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
        <h1>Edit Mapel</h1>
        <div class="data">
            <?php
            include 'koneksi.php';
            $id_mapel = $_GET['id'];
            $siakad = mysqli_query($conn, "SELECT * FROM mapel WHERE id_mapel='$id_mapel'");
            while ($d = mysqli_fetch_array($siakad)) {
                ?>
                <form method="post" action="edit_mapel.php">
                    <table>
                        <tr>
                            <td>Nama Mapel</td>
                            <td>
                                <input type="hidden" name="id_mapel" value="<?php echo $d['id_mapel']; ?>">
                                <input type="text" name="nama_mapel" value="<?php echo $d['nama_mapel']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Guru</td>
                            <td>
                                <input type="text" name="nama_guru" value="<?php echo $d['nama_guru']; ?>">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="id_mapel" value="<?php echo $d['id_mapel']; ?>">Simpan Perubahan</button>
                </form>
                <?php
            }
            ?>
        </div>
    </main>
    
</body>

</html>