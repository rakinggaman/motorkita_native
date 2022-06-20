<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_SESSION['kode_product'])) {
    $kode_product      = $_SESSION['kode_product'];
    $name_product    = $_POST['name_product'];
    $material_product        = $_POST['material_product'];
    $price_product    = $_POST['price_product'];

    // Update edit product

    if (!empty($images_product)) {
        $rand     = rand();
        $ekstensi = array('png', 'jpg', 'jpeg');
        $filename = $_FILES['images_product']['name'];
        $ukuran   = $_FILES['images_product']['size'];
        $ext      = pathinfo($filename, PATHINFO_EXTENSION);
        $tmp_file = $_FILES['images_product']['tmp_name'];

        if ($ukuran < 1044070) {
            $xx = $filename;
            move_uploaded_file($_FILES['images_product']['tmp_name'], "../image/" . $filename);
            $query = "UPDATE product SET name_product='$name_product', material_product='$material_product', price_product='$price_product', images_product='$images_product' WHERE kode_product=$kode_product";
            mysqli_query($koneksi, $query);
            $tambah++;
        }
    } else {
        $query = "UPDATE product SET name_product='$name_product', material_product='$material_product', price_product='$price_product' WHERE kode_product=$kode_product";
        mysqli_query($koneksi, $query);
        $tambah++;
    }

    header("Location:product.php?notif=editberhasil");
}
// $_SESSION['id_user']=$id_user;