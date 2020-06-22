<div class="container">
    <div class="row">
        <a href="admin.php?menu=tambah-informasi" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="row mt-4">
        <div class="col-8">
            <table class="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Informasi</th>
                        <th scope="col">QR Code</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM informasi");
                    $i = 1;
                    ?>
                    <?php while ($informasi = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $informasi["kode_informasi"] ?></td>
                            <td><img src="temp/<?= $informasi["qrcode"] ?>" alt=""></td>
                            <td>
                                <form action="route.php?act=hapus-informasi" method="POST">
                                    <input type="hidden" name="kode_informasi" value="<?= $informasi['kode_informasi'] ?>">
                                    <button type="submit" value="hapus-informasi" name="hapus-informasi" class="btn badge btn-danger">Hapus</button>
                                </form>


                                <form action="admin.php?menu=edit-informasi" method="POST">
                                    <input type="hidden" name="kode_informasi" value="<?= $informasi['kode_informasi'] ?>">
                                    <button type="submit" name="edit-informasi" value="edit-informasi" class="btn badge btn-success">Edit</button>
                                </form>

                                <form action="admin.php?menu=single-informasi" method="POST">
                                    <input type="hidden" name="kode_informasi" value="<?= $informasi['kode_informasi'] ?>">
                                    <button type="submit" class="btn badge btn-warning">Detail</button>
                                </form>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="col-4">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Kategori Informasi</h5>
                <div class="card-body">
                    <ul class="list-group">
                        <!-- looping kategori -->
                        <?php
                        $query = mysqli_query($conn, "SELECT kategori FROM kategori");
                        ?>
                        <?php while ($kategori = mysqli_fetch_assoc($query)) : ?>
                            <li class="list-group-item"><?= $kategori["kategori"] ?></li>
                        <?php endwhile; ?>
                        <!-- looping kategori -->
                    </ul>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#kategori">
                        Tambah Kategori
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="kategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="route.php?act=tambah-kategori" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategoriLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah-kategori" value="tambah-kategori" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>