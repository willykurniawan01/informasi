<div class="container">
    <div class="row">
        <div class="col-10">
            <?php
            $username = $_SESSION["username"];
            $query = mysqli_query($conn, "SELECT * FROM pengguna where username='$username'");
            ?>
            <?php while ($account = mysqli_fetch_assoc($query)) : ?>
                <form action="route.php?act=update-profile" method="POST" enctype="multipart/form-data">
                    <div class="card card-profile">
                        <div class="card-body d-flex">
                            <img src="assets/img/user/<?= $account['img'] ?>" style="width:200px; height:200px;" alt="">
                            <ul class="profile">
                                <li class="mt-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img">
                                        <label class="custom-file-label" for="img">Ubah Gambar</label>
                                    </div>
                                </li>
                                <li class="mt-3">
                                    <h4>Username:</h4>
                                    <h4><?= $account["username"] ?></h4>
                                </li>
                                <li class="mt-3">
                                    <h4>Password:</h4>
                                    <input type="password" value="<?= $account["username"] ?>" class="form-control" name="password">
                                </li>

                                <input type="hidden" name="last-img" value="<?= $account["img"] ?>">

                                <li class="mt-3">
                                    <button class="btn btn-primary" type="submit" name="update-profile" value="update-profile">Simpan Perubahan</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            <?php endwhile; ?>
        </div>
    </div>
</div>