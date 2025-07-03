<?php
include('db.php');
include('includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama = $_POST['nama_lengkap'];

    $query = "INSERT INTO user_admin (username, password, nama_lengkap) VALUES ('$username', '$password', '$nama')";
    if ($conn->query($query)) {
        header("Location: tampil_user_admin.php");
        exit;
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Kelola User Admin</h2>
    <h2 class="mb-4">Tambah Admin</h2>

    <form method="POST" action="" class="row g-3 mb-5">
        <div class="col-md-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="col-md-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Tambah Admin</button>
        </div>
    </form>
</div>

    

    <!-- Tabel Data Admin -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM user_admin ORDER BY id_user ASC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id_user']}</td>";
                echo "<td>{$row['username']}</td>";
                echo "<td>{$row['nama_lengkap']}</td>";
                echo "<td>
                        <a href='edit_user_admin.php?id={$row['id_user']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_user_admin.php?id={$row['id_user']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus admin ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Tombol Kembali -->
    <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Halaman Utama</a>
</div>

<?php include('includes/footer.php'); ?>
