<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>

<!-- Tombol Logout di pojok kanan atas -->
<div class="container-fluid">
    <div class="d-flex justify-content-end mt-3 me-4">
        <a href="home.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<div class="container my-5">
    <h1 class="text-center mb-4">Selamat Datang di Aplikasi Fitness</h1>

    <?php
    $result = $conn->query("SELECT COUNT(*) AS jumlah FROM member WHERE status = 'Tidak Aktif'");
    $row = $result->fetch_assoc();
    $jumlah_tidak_aktif = $row['jumlah'];

    if ($jumlah_tidak_aktif > 0) {
        echo "<div class='alert alert-warning text-center'>
                <strong>Perhatian!</strong> Terdapat <strong>$jumlah_tidak_aktif member</strong> yang statusnya <strong>Tidak Aktif</strong>. 
                <a href='tampil_member.php?status=Tidak+Aktif' class='alert-link'>Lihat sekarang</a>.
              </div>";
    }

    $conn->close();
    ?>

    <div class="row text-center mt-5">
        <div class="col-md-4 mb-4 dropdown">
            <button class="btn btn-primary btn-lg w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Daftar Member Baru
            </button>
            <ul class="dropdown-menu w-100 text-start">
                <li><a class="dropdown-item" href="form_pendaftaran.php">Pendaftaran Baru</a></li>
                <li><a class="dropdown-item" href="form_perpanjang.php">Perpanjangan Member</a></li>
                <li><a class="dropdown-item" href="form_paket.php">Buat Paket Baru</a></li>
            </ul>
        </div>
        <div class="col-md-4 mb-4">
            <a href="tampil_member.php" class="btn btn-success btn-lg w-100">Lihat Daftar Member</a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="kelola_paket.php" class="btn btn-info btn-lg w-100">Kelola Paket</a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="tampil_user_admin.php" class="btn btn-info btn-lg w-100">Kelola Admin</a>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
