<?php 
require('Model.php');

if (isset($_GET['id_buku'])) {
    editbuku();
}

if (isset($_POST['submit'])) {
    tambahBuku($_POST['id_buku'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['thnterbit']);
    header('Location: Buku.php'); // Redirect setelah menambah buku
    exit();
}

if (isset($_POST['update'])) {
    updateBuku($_POST['id_buku'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['thnterbit']);
    header('Location: Buku.php'); // Redirect setelah mengedit buku
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://ajax.aspnetcdn.com/ajax/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14edc419b7.js"></script>
    <title>Buku Perpus</title>
    <title><?php echo (isset($_GET['id_buku'])) ? "Edit Buku" : "Tambah Buku"; ?></title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #004aad;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar h2 {
            font-size: 1.5em;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1em;
            margin: 10px 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            transition: background 0.3s ease;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #00397a;
        }
        .container {
            margin-top: 20px;
            text-align: center;
        }
        h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        table {
            margin: 0 auto 20px auto;
            text-align: left;
        }
        td {
            padding: 8px;
        }
        input[type="text"], input[type="datetime-local"], input[type="date"] {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 6px 12px;
            width: 100%;
            font-size: 1em;
        }
        .btn-custom {
            background-color: red; 
            color: #fff; 
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #c70039;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style> 
</head>
<body>
    <div class="sidebar">
        <h2>eLibrary</h2>
        <a href="Dashboard.php" class="active"><i class="fa fa-home"></i> Dashboard</a>
        <a href="Member.php"><i class="fa fa-users"></i> Daftar Member</a>
        <a href="Peminjaman.php"><i class="fa fa-handshake"></i> Daftar Peminjaman</a>
        <a href="Buku.php"><i class="fa fa-book"></i> Daftar Buku</a>
    </div>
    <div class="container">
        <h2>Form Buku</h2>
        <form action="" method="post">
            <?php
            if (isset($_GET['id_buku'])) {
                $sql = "SELECT * FROM buku WHERE id_buku = " . $_GET['id_buku'];
                $result = mysqli_query($conn, $sql);
                foreach ($result as $res) :
            ?>
            <table>
                <tr>
                    <td>ID Buku</td>
                    <td><input type="text" name="id_buku" value="<?php echo $res["id_buku"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul" value="<?php echo $res["judul_buku"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Nama Penulis</td>
                    <td><input type="text" name="penulis" value="<?php echo $res["penulis"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit" value="<?php echo $res["penerbit"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td><input type="text" name="thnterbit" value="<?php echo $res["tahun_terbit"]; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="update" class="btn-custom">Edit</button>
                    </td>
                </tr>
            </table>
            <?php
                endforeach;
            } else {
            ?>
            <table>
                <tr>
                    <td>ID Buku</td>
                    <td><input type="text" name="id_buku" value="" required></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul" value="" required></td>
                </tr>
                <tr>
                    <td>Nama Penulis</td>
                    <td><input type="text" name="penulis" value="" required></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit" value="" required></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td><input type="text" name="thnterbit" value="" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="submit" class="btn-custom">Tambah</button>
                    </td>
                </tr>
            </table>
            <?php } ?>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        tambahBuku($_POST['id_buku'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['thnterbit']);
    }
    if (isset($_POST['update'])) {
        updateBuku($_GET['id_buku'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['thnterbit']);
    }
    ?>
</body>
</html>