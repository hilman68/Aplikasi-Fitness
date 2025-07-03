<?php
include 'db.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM paket WHERE id_paket = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama_paket = $_POST['nama_paket'];
    $durasi_bulan = $_POST['durasi_bulan'];
    $harga = $_POST['harga'];

    mysqli_query($conn, "UPDATE paket SET 
        nama_paket='$nama_paket', 
        durasi_bulan='$durasi_bulan', 
        harga='$harga' 
        WHERE id_paket='$id'");

    header("Location: kelola_paket.php");
}
?>

<h3>Edit Paket</h3>
<form method="POST">
    <label>Nama Paket:</label>
    <input type="text" name="nama_paket" value="<?= $data['nama_paket'] ?>" required><br>

    <label>Durasi (bulan):</label>
    <input type="number" name="durasi_bulan" value="<?= $data['durasi_bulan'] ?>" required><br>

    <label>Harga:</label>
    <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>

    <button type="submit" name="update">Update</button>
</form>
