<!DOCTYPE html>
<html lang="en">
<?php require "layout/head.php"; ?>

<body>
    <div id="app">
        <?php require "layout/sidebar.php"; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card p-4">
                        <h4 class="text-center">Sistem Pakar Prediksi Ekspansi Bisnis Penjualan Kerupuk Ikan</h4>
                        </div>
                        <div class="card p-4">
                            <h4>Kelompok 2 </h4>
                            <hr>
                            <p>Anggota :</p>
                            <p class="my-1">1. Muhammad Ridhan Khoirullah (09021282126043)</p>
                            <p class="my-1">2. M.Rendi Alamsyah (09021282126061)</p>
                            <p class="my-1">3. Sultan Rafi Lukmanul Hakim (09021282126067)</p>
                            <p class="my-1">4. Muhammad Ilham Saputra (09021282126079)</p>

                        </div>
                        <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="card p-4">
            <h4> Input User </h4>
              <div class="card-content">
                <hr>
                <form action="process.php" method="post">
    <div class="form-group">
        <label for="kepuasan_pelanggan">Kepuasan Pelanggan:</label>
        <select name="kepuasan_pelanggan" id="kepuasan_pelanggan" class="form-control" required>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select>
    </div>

    <div class="form-group">
        <label for="pesaing">Pesaing:</label>
        <select name="pesaing" id="pesaing" class="form-control" required>
            <option value="ada">Ada</option>
            <option value="tidak_ada">Tidak Ada</option>
        </select>
    </div>

    <div class="form-group">
        <label for="ketersediaan_karyawan">Ketersediaan Karyawan:</label>
        <select name="ketersediaan_karyawan" id="ketersediaan_karyawan" class="form-control" required>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select>
    </div>

    <div class="form-group">
        <label for="ketersediaan_stok">Ketersediaan Stok:</label>
        <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control" required>
            <option value="ya">Ya</option>
            <option value="tidak">Tidak</option>
        </select>
    </div>

    <div class="form-group">
        <label for="keuntungan">Keuntungan:</label>
        <select name="keuntungan" id="keuntungan" class="form-control" required>
            <option value="besar">Besar (> Rp8.000.000) </option>
            <option value="sedang">Sedang (Rp3.000.0000 - Rp8.000.000)</option>
            <option value="kecil">Kecil (< Rp3.000.000) </option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Prediksi</button>
</form>

              </div>
            </div>
                    </div>
                </section>
            </div>
            <?php require "layout/footer.php"; ?>
        </div>
    </div>
    <?php require "layout/js.php"; ?>
</body>

</html>