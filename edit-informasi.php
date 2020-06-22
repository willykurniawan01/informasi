<div class="container">
    <div class="row">
        <div class="col-8">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM informasi where kode_informasi='$kode_informasi'");
            ?>
            <?php while ($informasi = mysqli_fetch_assoc($query)) : ?>
                <form method="POST" action="route.php?act=update-informasi">
                    <div class="form-group">
                        <label for="kode_informasi">Kode Informasi</label>
                        <h4><?= $informasi["kode_informasi"] ?></h4>
                    </div>
                    <div class="form-group">
                        <label for="informasi">Informasi</label>
                        <textarea name="informasi" id="editor1"><?= $informasi["informasi"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="custom-select" name="kategori">
                            <option selected value="<?= $informasi["kategori"] ?>">Open this select menu</option>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM kategori");
                            ?>
                            <?php while ($kategori = mysqli_fetch_assoc($query)) : ?>
                                <option value="<?= $kategori["id_kategori"] ?>">
                                    <?= $kategori["kategori"] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" name="update-informasi" value="update-informasi" class="btn btn-primary">Submit</button>
                </form>
            <?php endwhile; ?>
        </div>
    </div>

</div>