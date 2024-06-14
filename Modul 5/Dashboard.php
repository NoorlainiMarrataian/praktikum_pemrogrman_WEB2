<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://ajax.aspnetcdn.com/ajax/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14edc419b7.js"></script>
    <title>Manajemen Peminjaman Buku</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
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
        .header-section {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .header-section img {
            width: 150px;
            height: auto;
            margin-right: 20px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #004aad;
            color: #fff;
            border-radius: 15px 15px 0 0;
            padding: 15px;
            font-size: 1.25em;
        }
        .card-body {
            padding: 20px;
            background-color: #fff;
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
            margin-right: 10px; 
            margin-bottom: 10px; 
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
        .img-fluid {
            width: 100%; 
            height: auto; 
            max-width: 100px; 
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
        <div class="header-section">
            <img src="https://images.pexels.com/photos/3394660/pexels-photo-3394660.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Welcome Image" class="img-fluid rounded mb-4">
            <h1>PERPUSTAKAAN LITERATUR LOKA</h1>
        </div>
        <hr>
        <div class="welcome-section card">
            <div class="card-body text-center">
                <h2>Selamat Datang!</h2>
                <p>Kami menyediakan berbagai menu untuk memudahkan aktivitas Anda</p>
                <div class="menu-horizontal d-flex justify-content-center gap-3">
                    <a class="btn btn-custom" href="Member.php"><i class="fa fa-users"></i> Daftar Member</a>
                    <a class="btn btn-custom" href="Buku.php"><i class="fa fa-book"></i> Daftar Buku</a>
                    <a class="btn btn-custom" href="Peminjaman.php"><i class="fa fa-handshake"></i> Daftar Peminjaman</a>
                </div>
            </div>
        </div>
        <div class="card info-card mx-auto">
            <div class="card-header"><i class="fa fa-circle-info"></i> INFORMASI TERSEDIA</div>
            <div class="card-body">
                <p><b>Daftar Member</b> untuk cek daftar member yang terdaftar</p>
                <p><b>Daftar Buku</b> untuk cek daftar buku yang tersedia</p>
                <p><b>Daftar Peminjaman</b> untuk cek daftar peminjaman buku</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/bootstrap/5.1.3/bootstrap.bundle.min.js"></script>
</body>
</html>