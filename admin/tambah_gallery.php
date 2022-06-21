<?php
// session_start();
include('../koneksi/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--CSS-->
    <!--Boxicons CDN LINK-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <title>Tambah Gallery</title>
</head>

<body>
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5 p-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning mt-3 mb-3" href="gallery.php">
                        <i class="fas fa-arrow-circle-left "></i> Kembali
                    </a>
                </div>
                <form class="form-horizontal" method="post" action="konfirmasi_tambah_gallery.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Tambah Data</h4>
                        <?php if (!empty($_GET['notif'])) { ?>
                            <?php if ($_GET['notif'] == "tambahkosong") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Maaf data wajib di isi</div>
                            <?php } ?>
                        <?php } ?>
                        <div class="form-group row">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Name Gallery</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="part_name" name="name_gallery" placeholder="Gallery" value="<?php if (!empty($_SESSION['name_gallery'])) {
                                                                                                                                        } ?>" />
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Description Gallery</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="part_name" name="description_gallery" placeholder="Gallery" value="<?php if (!empty($_SESSION['description_gallery'])) {
                                                                                                                                                } ?>" />
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">Images Gallery</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="images_gallery" name="images_gallery" value="<?php if (!empty($_SESSION['images_gallery'])) {
                                                                                                                                echo $_SESSION['images_gallery'];
                                                                                                                            } ?>" />
                                <h7> <span style="color: red;">maksimal 2mb</span> </h7>
                                <button type="submit" class="btn  float-end mt-5 mb-3 " style="background-color: #66320D; color:#ffff;"> <i class="fas fa-plus me-2"></i>Tambah </button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</body>

</html>