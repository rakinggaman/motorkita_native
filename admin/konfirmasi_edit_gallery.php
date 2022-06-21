<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_SESSION['kode_gallery'])) {
    $kode_gallery      = $_SESSION['kode_gallery'];
    $name_gallery    = $_POST['name_gallery'];
    $description_gallery        = $_POST['description_gallery'];
    $images_gallery    = $_FILES['images_gallery']['name'];

    // Update edit gallery

    if (!empty($images_gallery)) {
        $rand     = rand();
        $ekstensi = array('png', 'jpg', 'jpeg');
        $filename = $_FILES['images_gallery']['name'];
        $ukuran   = $_FILES['images_gallery']['size'];
        $ext      = pathinfo($filename, PATHINFO_EXTENSION);
        $tmp_file = $_FILES['images_gallery']['tmp_name'];

        if ($ukuran < 1044070) {
            $xx = $filename;
            move_uploaded_file($_FILES['images_gallery']['tmp_name'], "../image/place/" . $filename);
            $query = "UPDATE gallery SET name_gallery='$name_gallery', description_gallery='$description_gallery', images_gallery='$images_gallery' WHERE kode_gallery=$kode_gallery";
            mysqli_query($koneksi, $query);
            $tambah++;
        }
    } else {
        $query = "UPDATE gallery SET name_gallery='$name_gallery', description_gallery='$description_gallery' WHERE kode_gallery=$kode_gallery";
        mysqli_query($koneksi, $query);
        $tambah++;
    }

    header("Location:gallery.php?notif=editberhasil");
}
// $_SESSION['id_user']=$id_user;