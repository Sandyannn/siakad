<?php
include 'koneksi.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO user (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";
    if (mysqli_query($conn, $sql)) {

        header("Location: login.php");
        exit();
    } else {
        $error_message = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        main {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            color: #001f3f;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333333;
            display: block;
            margin-bottom: 5px;
        }

        input,
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

        input:focus,
        select:focus {
            border-color: #001f3f;
            box-shadow: 0 0 8px rgba(0, 31, 63, 0.5);
            outline: none;
        }

        /* Tombol login */
        button {
            width: 100%;
            background-color: #001f3f;
            color: #ffffff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #004080;
            transform: scale(1.03);
            box-shadow: 0 4px 10px rgba(0, 31, 63, 0.3);
        }

        button:active {
            background-color: #003060;
            transform: scale(1);
        }

        /* Teks tambahan */
        .cek {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .cek a {
            color: #001f3f;
            text-decoration: none;
            font-weight: bold;
        }

        .cek a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <main>
            <h1>Registrasi</h1>
            <fieldset>
                <p>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama di sini" required>
                </p>
                <p>
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username di sini" required>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password di sini" required>
                </p>
                <p>
                    <label for="role">Pilih Role</label>
                    <select id="role" name="role" required>
                        <option value="guru">Guru</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </p>
                <p>
                    <button type="submit">Daftar</button>
                </p>
            </fieldset>
            <div class="cek">
                <p>Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
            </div>
        </main>
    </form>
</body>

</html>