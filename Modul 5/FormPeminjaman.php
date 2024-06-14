<?php 
require('Model.php');

if (isset($_GET['id_peminjaman'])) {
    editPeminjaman();
}
if (isset($_POST['submit'])) {
    tambahPeminjaman($_POST['id_Peminjaman'], $_POST['pinjam'], $_POST['kembali'], $_POST['id_buku'], $_POST['id_member']);
    header('Location: Peminjaman.php'); // Redirect setelah menambah peminjaman
    exit();
}

if (isset($_POST['update'])) {
    updatePeminjaman($_POST['id_Peminjaman'], $_POST['pinjam'], $_POST['kembali'], $_POST['id_buku'], $_POST['id_member']);
    header('Location: Peminjaman.php'); // Redirect setelah mengedit peminjaman
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
    <title>Peminjaman Bukus</title>
    <?php echo (isset($_GET['id_peminjaman'])) ? "<title>Edit Data Peminjaman</title>" : "<title>Tambah Data Peminjaman</title>"; ?> 
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
        input[type="text"], input[type="date"], select {
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
        <h2>Tambah Data Peminjaman</h2>
        <form action="" method="post">
            <?php
            if (isset($_GET['id_peminjaman'])) {
                $sql = "SELECT * FROM peminjaman WHERE id_peminjaman = " . $_GET['id_peminjaman'];
                $result = mysqli_query($conn, $sql);
                foreach ($result as $res) :
            ?>
            <table>
                <tr>
                    <td>ID Peminjaman</td>
                    <td><input type="text" name="id_Peminjaman" value="<?php echo $res["id_peminjaman"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Tanggal Peminjaman</td>
                    <td><input type="date" name="pinjam" value="<?php echo $res["tgl_peminjaman"]; ?>" required></td>
                </tr>
                <tr>
                    <td>Tanggal Kembalian</td>
                    <td><input type="date" name="kembali" value="<?php echo $res["tgl_kembali"]; ?>" required></td>
                </tr>
                <tr>
                    <td>ID Buku</td>
                    <td>
                        <select name="id_buku">
                            <?php
                            $buku = tampilIdBuku();
                            foreach ($buku as $bk) :
                            ?>
                                <option value="<?= $bk['id_buku']; ?>" <?php if ($bk['id_buku'] == $res['id_buku']) echo 'selected'; ?>><?= $bk['judul_buku']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ID Member</td>
                    <td>
                        <select name="id_member">
                            <?php
                            $member = tampilIdMember();
                            foreach ($member as $mb) :
                            ?>
                                <option value="<?= $mb['id_member']; ?>" <?php if ($mb['id_member'] == $res['id_member']) echo 'selected'; ?>><?= $mb['nama_member']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
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
                    <td>ID Peminjaman</td>
                    <td><input type="text" name="id_Peminjaman" value="" required></td>
                </tr>
                <tr>
                    <td>Tanggal Peminjaman</td>
                    <td><input type="date" name="pinjam" value="" required></td>
                </tr>
                <tr>
                    <td>Tanggal Kembalian</td>
                    <td><input type="date" name="kembali" value="" required></td>
                </tr>
                <tr>
                    <td>ID Buku</td>
                    <td>
                        <select name="id_buku">
                            <?php
                            $buku = tampilIdBuku();
                            foreach ($buku as $bk) :
                            ?>
                                <option value="<?= $bk['id_buku']; ?>"><?= $bk['judul_buku']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ID Member</td>
                    <td>
                        <select name="id_member">
                            <?php
                            $member = tampilIdMember();
                            foreach ($member as $mb) :
                            ?>
                                <option value="<?= $mb['id_member']; ?>"><?= $mb['nama_member']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
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
        tambahpeminjaman($_POST['id_Peminjaman'], $_POST['pinjam'], $_POST['kembali'], $_POST['id_buku'], $_POST['id_member']);
    }
    if (isset($_POST['update'])) {
        updatepeminjaman($_POST['id_Peminjaman'], $_POST['pinjam'], $_POST['kembali']);
    }
    ?>
</body>
</html>