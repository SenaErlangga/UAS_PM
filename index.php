<!DOCTYPE html>
<html>
<head>
    <title>Harga Handphone</title>
    <style>
        .phone-item {
            margin-bottom: 10px;
        }

        .delete-button {
            color: red;
            text-decoration: none;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            padding: 20px 0;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-form,
        .add-form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

     .delete-button {
    background-color: #ff4136;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 3px;
    cursor: pointer;
}

.delete-button:hover {
    background-color: #dc2f26;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website Harga HP</h1>

        <div class="search-form">
            <h2>Cari Handphone</h2>
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="search" placeholder="apa yang anda cari?">
                <input type="submit" value="Cari">
            </form>
        </div>

        <?php
        include 'list_phone.php';  // Memasukkan kode PHP untuk menampilkan daftar telepon

        // Memeriksa apakah ada parameter pencarian
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            searchPhone($searchTerm);  // Memanggil fungsi pencarian telepon dari kode PHP yang ada
        }
        ?>

        <h2>Tambah Data Handphone</h2>
        <form method="post" action="submit_phone.php">
            <table>
                <tr>
                    <td>Id :</td>
                    <td><input type="text" name="id_phone"></td>
                </tr>
                <tr>
                    <td>Tipe Handphone:</td>
                    <td><input type="text" name="phone_name"></td>
                </tr>
                <tr>
                    <td>Harga :</td>
                    <td><input type="text" name="price"></td>
                </tr>
            </table>
            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
