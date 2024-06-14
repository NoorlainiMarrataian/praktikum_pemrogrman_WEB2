<?php 
require('Model.php');

if (isset($_GET['id_member'])) {
    editMember();
}

if (isset($_POST['submit'])) {
    tambahMember($_POST['id_member'], $_POST['Nama'], $_POST['nomor'], $_POST['alamat'], $_POST['daftar'], $_POST['bayar']);
    header("Location: Member.php");
    exit();
}

if (isset($_POST['update'])) {
    updateMember($_POST['id_member'], $_POST['Nama'], $_POST['nomor'], $_POST['alamat'], $_POST['daftar'], $_POST['bayar']);
    header("Location: Member.php");
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
    <title>Member Perpus</title>
    <?php echo (isset($_GET['id_member'])) ? "<title>Edit Member</title>" : "<title>Tambah Member</title>"; ?>
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
        <h2>Form Member</h2>
        <form action="" method="post">
            <?php
            if (isset($_GET['id_member'])) {
                $sql = "SELECT * FROM member WHERE id_member = " . $_GET['id_member'];
                $result = mysqli_query($conn, $sql);
                foreach ($result as $res) :
            ?>
            <table>
                <tr>
                    <td>ID Member</td>
                    <td><input type="text" name="id_member" <?php echo "value=\"" . $res["id_member"] . "\""; ?> required></td>
                </tr>
                <tr>
                    <td>Nama Member</td>
                    <td><input type="text" name="Nama" <?php echo "value=\"" . $res["nama_member"] . "\""; ?> required></td>
                </tr>
                <tr>
                    <td>Nomor Member</td>
                    <td><input type="text" name="nomor" <?php echo "value=\"" . $res["nomor_member"] . "\""; ?> required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" <?php echo "value=\"" . $res["alamat"] . "\""; ?> required></td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td><input type="datetime-local" name="daftar" <?php echo "value=\"" . $res["tgl_mendaftar"] . "\""; ?> required></td>
                </tr>
                <tr>
                    <td>Tanggal bayar Terakhir</td>
                    <td><input type="date" name="bayar" <?php echo "value=\"" . $res["tgl_terakhir_bayar"] . "\""; ?> required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <?php 
                        if (isset($_GET['id_member'])) {
                            echo "<button type=\"submit\" name=\"update\" class=\"btn-custom\">Edit</button>";
                        } else {
                            echo "<button type=\"submit\" name=\"submit\" class=\"btn-custom\">Tambah</button>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <?php 
                endforeach;
            } else {
            ?>
            <table>
                <tr>
                    <td>ID Member</td>
                    <td><input type="text" name="id_member" value="" required></td>
                </tr>
                <tr>
                    <td>Nama Member</td>
                    <td><input type="text" name="Nama" value="" required></td>
                </tr>
                <tr>
                    <td>Nomor Member</td>
                    <td><input type="text" name="nomor" value="" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="" required></td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td><input type="datetime-local" name="daftar" value="" required></td>
                </tr>
                <tr>
                    <td>Tanggal bayar Terakhir</td>
                    <td><input type="date" name="bayar" value="" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <?php 
                        if (isset($_GET['id_member'])) {
                            echo "<button type=\"submit\" name=\"update\" class=\"btn-custom\">Edit</button>";
                        } else {
                            echo "<button type=\"submit\" name=\"submit\" class=\"btn-custom\">Tambah</button>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <?php } ?>
        </form>
    </div>
    <br>
</body>
</html>