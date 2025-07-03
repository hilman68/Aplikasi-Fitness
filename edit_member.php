<?php
include 'db.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM member WHERE id_member = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE member SET 
        nama='$nama', 
        no_telepon='$no_telepon', 
        alamat='$alamat', 
        tanggal_daftar='$tanggal_daftar', 
        tanggal_kadaluarsa='$tanggal_kadaluarsa', 
        status='$status' 
        WHERE id_member='$id'");

    header("Location: tampil_member.php");
}
?>

<h3>Edit Member</h3>
<form method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>

    <label>No Telepon:</label>
    <input type="text" name="no_telepon" value="<?= $data['no_telepon'] ?>"><br>

    <label>Alamat:</label>
    <textarea name="alamat"><?= $data['alamat'] ?></textarea><br>

    <label>Tanggal Daftar:</label>
    <input type="date" name="tanggal_daftar" value="<?= $data['tanggal_daftar'] ?>"><br>

    <label>Tanggal Kadaluarsa:</label>
    <input type="date" name="tanggal_kadaluarsa" value="<?= $data['tanggal_kadaluarsa'] ?>"><br>

    <label>Status:</label>
    <select name="status">
        <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
        <option value="Tidak Aktif" <?= $data['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
    </select><br><br>

    <button type="submit" name="update">Update</button>
</form>
