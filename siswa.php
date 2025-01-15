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
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        body.fade-out {
            opacity: 0;
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
            transition: transform 0.7s ease-in-out;
        }

        header.slide-up {
            transform: translateY(-100%);
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
            transition: transform 0.7s ease-in-out, opacity 0.7s ease-in-out;
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

        .data table tr {
            animation: alternateRow 1.2s ease-out;
            animation-fill-mode: both;
        }

        .data table tr:nth-child(odd) {
            animation-name: slideInFromRight;
            animation-delay: 2.3s;
        }

        .data table tr:nth-child(even) {
            animation-name: slideInFromLeft;
            animation-delay: 2.5s;
        }

        .data table tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease-in-out;
        }

        .data ul li {
            list-style: none;
        }

        .data a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #001f3f;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .data a:hover {
            background-color: #f1f1f1;
            border-color: white;
            color: #001f3f;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
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

        @keyframes slideInFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInFromLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInFromSides {
            from {
                transform: translateX(50%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
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
        <h1>Daftar Siswa</h1>
        <div class="data">
            <table>
                <ul>
                    <li> <a href="tambah_siswa.php">+ Tambah Siswa</a> </li>
                </ul>
                <tr>
                    <th>Id Siswa</th>
                    <th>Absen</th>
                    <th>Nama Siswa</th>
                    <th>Opsi</th>
                </tr>
                <?php
                include 'koneksi.php';
                $siakad = mysqli_query($conn, "SELECT * FROM siswa");
                while ($d = mysqli_fetch_array($siakad)) {
                    ?>
                    <tr>
                        <td><?php echo $d['id_siswa']; ?></td>
                        <td><?php echo $d['absen']; ?></td>
                        <td><?php echo $d['nama_siswa']; ?></td>
                        <td>
                            <a href="edit_siswa.php?id=<?php echo $d['id_siswa']; ?>">edit</a>
                            <a href="hapus_siswa.php?id=<?php echo $d['id_siswa']; ?>" onclick="return confirm('Apakah yakin ingin menghapus data siswa?')">hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </main>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const links = document.querySelectorAll("a"); 

        links.forEach(link => {
            link.addEventListener("click", (event) => {
                event.preventDefault(); 

                const href = link.getAttribute("href"); 

                document.querySelector("header").classList.add("slide-up");
                document.querySelector("main").classList.add("slide-down"); 

                setTimeout(() => {
                    window.location.href = href;
                }, 1000); 
            });
        });
    });
</script>
</body>

</html>