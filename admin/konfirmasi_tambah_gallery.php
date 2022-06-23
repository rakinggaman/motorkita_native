<?php
include('../koneksi/koneksi.php');

$name_gallery = $_POST['name_gallery'];
$description_gallery = $_POST['description_gallery'];
$tambah = 0;

if (empty($name_gallery)) {
    header("Location:tambah_gallery.php?notif=tambahkosong&data=name_gallery");
} else if (empty($description_gallery)) {
    header("Location:tambah_gallery.php?notif=tambahkosong&data=description_gallery");
} else {

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename     = $_FILES['images_gallery']['name'];
    $ukuran = $_FILES['images_gallery']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $tmp_file = $_FILES['images_gallery']['tmp_name'];

    if ($ukuran < 1044070) {
        $xx = $filename;
        move_uploaded_file($_FILES['images_gallery']['tmp_name'], "../image/place/" . $filename);
        $sql = "INSERT INTO `gallery` (`name_gallery`, `description_gallery`, `images_gallery`) 
			VALUES ('$name_gallery', '$description_gallery','$xx')";
        mysqli_query($koneksi, $sql);

        // copy($tmp_file, "../")

        $tambah++;
    } else {
        $sql = "INSERT INTO `gallery` (`name_gallery`, `description_gallery`) 
			VALUES ('$name_gallery', '$description_gallery')";
        mysqli_query($koneksi, $sql);
        $tambah++;
    }
    header("Location:gallery.php?notif=tambahberhasil");
}
