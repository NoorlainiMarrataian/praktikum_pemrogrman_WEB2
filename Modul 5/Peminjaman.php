<?php 
require('Model.php');

if (isset($_GET['id_peminjaman'])){
    hapusMember($_GET['id_peminjaman']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://ajax.aspnetcdn.com/ajax/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14edc419b7.js"></script>
    <title>Data Peminjaman</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
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
        .content {
            margin-left: 250px;
            padding: 30px;
        }
        .content h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .btn-custom {
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 30px;
            transition: all 0.3s ease;
            background-color: #ffc107;
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
        }
        .btn-custom img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .btn-custom:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }
        table thead tr {
            background-color: #004aad;
            color: #ffffff;
            text-align: center;
            font-weight: bold;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: center;
        }
        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        table tbody tr:last-of-type {
            border-bottom: 2px solid #004aad;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table-responsive {
            overflow-x: auto;
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
    <div class="content">
        <h1>PERPUSTAKAAN LITERATUR LOKA</h1>
        <hr>
        <h3>Data Peminjaman</h3>
        <a class="btn btn-success my-1" href='FormPeminjaman.php'><i class="fa fa-handshake"></i> Tambah Peminjaman</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Kembali</th>
                        <th>ID Buku</th>
                        <th>ID Member</th>
                        <th>Aksi</th>
                        </tr>
                </thead>
                <tbody>
                    <?php tampilPeminjaman(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete(url) {
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                window.location.href = url;
            }
        }
    </script>
</body>
</html>