<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort Names</title>
</head>
<body>
    <h2>Sort Names</h2>
    <form action="" method="post">
        <label for="nama1">Nama 1:</label>
        <input type="text" id="nama1" name="nama1" required><br><br>
        <label for="nama2">Nama 2:</label>
        <input type="text" id="nama2" name="nama2" required><br><br>
        <label for="nama3">Nama 3:</label>
        <input type="text" id="nama3" name="nama3" required><br><br>
        <button type="submit" name="submit">Urutkan</button>
    </form>
 <?php
    if (isset($_POST['submit'])) {
        $nama1 = $_POST['nama1'];
        $nama2 = $_POST['nama2'];
        $nama3 = $_POST['nama3'];
    if ($nama1 <= $nama2 && $nama1 <= $nama3) {
        $min = $nama1;
    if ($nama2 <= $nama3) {
        $mid = $nama2;
        $max = $nama3;
        } else {
        $mid = $nama3;
        $max = $nama2;
        }
    } elseif ($nama2 <= $nama1 && $nama2 <= $nama3) {
        $min = $nama2;
    if ($nama1 <= $nama3) {
        $mid = $nama1;
        $max = $nama3;
        } else {
        $mid = $nama3;
        $max = $nama1;
        }
    } else {
    if ($nama1 <= $nama2) {
        echo "$nama3 <br> $nama1 <br> $nama2";
        } else {
        echo "$nama3 <br> $nama2 <br> $nama1";
        }
    }
 }
 ?>
</body>
</html>