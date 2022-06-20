<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $kode_product = $_GET['data'];
    $_SESSION['kode_product'] = $kode_product;

    //get data projek
    $sql_m = "SELECT * FROM `product` WHERE `kode_product` = '$kode_product' ";
    $query_m = mysqli_query($koneksi, $sql_m);
    while ($data_m = mysqli_fetch_row($query_m)) {
        $kode_product        = $data_m[0];
        $name_product          = $data_m[1];
        $material_product          = $data_m[2];
        $price_product      = $data_m[3];
        $image_product      = $data_m[4];
    }
}
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
    <link rel="stylesheet" href="asset/css/styles.css" />
    <!--Boxicons CDN LINK-->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <title>Edit Proyek</title>
</head>

<body>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid mt-5 p-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning mt-3 mb-3" href="product.php">
                        <i class="fas fa-arrow-circle-left "></i> Kembali
                    </a>
                </div>
                <form class="form-horizontal" method="post" action="konfirmasi_edit_product.php" enctype="multipart/form-data">
                    <?php if (!empty($_GET['notif'])) { ?>
                        <?php if ($_GET['notif'] == "editkosong") { ?>
                            <div class="alert alert-danger" role="alert">
                                Maaf data proyek wajib di isi</div>
                        <?php } ?>
                    <?php } ?>
                    <div class="card-body">
                        <h4 class="card-title mt-2">Form Edit Data</h4>
                        <div class="form-group row">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">name product</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name_product" name="name_product" value="<?= $name_product; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">material product</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="material_product" name="material_product" value="<?= $material_product; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">price product</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="price_product" name="price_product" value="<?= $price_product; ?>">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <label for="part_name" class="col-sm-3 text-end control-label col-form-label">images_product</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="images_product_projek" name="images_product_projek" />
                                <h7> <span style="color: red;">maksimal 2mb</span> </h7>
                                <h7> <span style="color: red;">update images_product if want </span> </h7>
                                <button type="submit" class="btn  float-end mt-5 mb-3 " style="background-color: #66320D; color:#ffff;"> <i class="fas fa-plus me-2"></i>Edit </button>

                            </div>

                        </div>
                    </div>
            </div>

        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>