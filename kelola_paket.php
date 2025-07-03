<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Kelola Data Paket</h2>

    <!-- Form tambah paket -->
    <form action="proses_tambah_paket.php" method="POST" class="row g-3 mb-5">
        <div class="col-md-4">
            <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket" required>
        </div>
        <div class="col-md-3">
            <input type="number" class="form-control" name="durasi_bulan" placeholder="Durasi (bulan)" required>
        </div>
        <div class="col-md-3">
            <input type="number" class="form-control" name="harga" placeholder="Harga" step="1000" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Tambah Paket</button>
        </div>
    </form>

    <!-- Tabel daftar paket -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Paket</th>
                <th>Nama Paket</th>
                <th>Durasi (bulan)</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'database_fitnes');
            $result = $conn->query("SELECT * FROM paket ORDER BY id_paket ASC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id_paket']}</td>";
                echo "<td>{$row['nama_paket']}</td>";
                echo "<td>{$row['durasi_bulan']}</td>";
                echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                echo "<td>
                        <a href='edit_paket.php?id={$row['id_paket']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_paket.php?id={$row['id_paket']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus paket ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Tombol kembali -->
    <a href="index.php" class="btn btn-secondary mt-3">Kembali ke Halaman Utama</a>
</div>

<?php include('includes/footer.php'); ?>
