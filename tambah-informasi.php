<div class="container">
    <div class="row">
        <div class="col-8">
            <form method="POST" action="route.php?act=tambah-informasi">
                <div class="form-group">
                    <label for="kode_informasi">Kode Informasi</label>
                    <input type="text" name="kode_informasi" class="form-control" id="kode_informasi" value="INF-">
                </div>
                <div class="form-group">
                    <label for="informasi">Informasi</label>
                    <textarea name="informasi" id="editor1"></textarea>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="custom-select" name="kategori">
                        <option selected>Open this select menu</option>
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
                <button type="submit" name="tambah-informasi" value="tambah-informasi" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>