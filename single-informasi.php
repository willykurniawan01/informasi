<div class="container">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM informasi where kode_informasi='$kode_informasi'");
    ?>
    <?php while ($informasi = mysqli_fetch_assoc($query)) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Kode Informasi</label>
                    <h4 class="text-danger"><?= $informasi["kode_informasi"] ?></h4>
                </div>
                <div class="form-group">
                    <label>Informasi</label>
                    <div class="card">
                        <div class="card-body">
                            <p><?= $informasi["informasi"] ?></p>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <h4 class="text-success">
                        <?php
                        $id_kategori = $informasi["id_kategori"];
                        $query = mysqli_query($conn, "SELECT kategori from kategori where id_kategori='$id_kategori'");
                        $kategori = mysqli_fetch_assoc($query);
                        echo $kategori['kategori'];
                        ?>
                    </h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="temp/<?= $informasi["kode_informasi"] ?>.png" alt="">
                        <h1 class="text-dark">QR CODE</h1>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>