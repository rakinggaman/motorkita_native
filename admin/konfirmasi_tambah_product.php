<?php
include('../koneksi/koneksi.php');

$name_product = $_POST['name_product'];
$material_product = $_POST['material_product'];
$price_product = $_POST['price_product'];
$tambah = 0;

if (empty($name_product)) {
    header("Location:tambah_product.php?notif=tambahkosong&data=name_product");
} else if (empty($material_product)) {
    header("Location:tambah_product.php?notif=tambahkosong&data=material_product");
} else if (empty($price_product)) {
    header("Location:tambah_product.php?notif=tambahkosong&data=price_product");
} else {

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename     = $_FILES['images_product']['name'];
    $ukuran = $_FILES['images_product']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $tmp_file = $_FILES['images_product']['tmp_name'];

    if ($ukuran < 1044070) {
        $xx = $filename;
        move_uploaded_file($_FILES['images_product']['tmp_name'], "../image/" . $filename);
        $sql = "INSERT INTO `product` (`name_product`, `material_product`, `price_product`, `images_product`) 
			VALUES ('$name_product', '$material_product', '$price_product','$xx')";
        mysqli_query($koneksi, $sql);

        // copy($tmp_file, "../")

        $tambah++;
    } else {
        $sql = "INSERT INTO `product` (`name_product`, `material_product`, `price_product`) 
			VALUES ('$name_product', '$material_product', '$price_product')";
        mysqli_query($koneksi, $sql);
        $tambah++;
    }
    header("Location:product.php?notif=tambahberhasil");
}
