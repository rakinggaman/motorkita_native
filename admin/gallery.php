<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_gallery = $_GET['data'];
        //hapus gallery
        $sql_dh = "delete from `gallery`
  	where `kode_gallery` = '$id_gallery'";
        mysqli_query($koneksi, $sql_dh);
    }
}
?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="admin.css">
    </head>

    <body style="background-color: #fdfdfd;">
        <div class="dashboard-page">
            <div class="wrapper">
                <div class="sidebar">
                    <div class="sidebar-header mb-5">
                        <a href="#" class="sidebar-logo fs-5 fw-bold mb-3">Motor<span style="color: #66320D;">Kita</span></a>
                        <button class="btn btn-white d-block d-md-none" type="button" onclick="sidebarMenu()">
                            <i class="bx bx-menu"></i>
                        </button>
                    </div>

                    <div class="sidebar-menu " id="sidebarMenu">
                        <!--Sidebar Top-->
                        <a href="dashboard.php" class="sidebar-link">
                            <i class="bx bx-home"></i> <span>Dashboard</span></i>
                        </a>
                        <a href="product.php" class="sidebar-link">
                            <i class="bx bx-transfer"></i> <span>Products</span></i>
                        </a>
                        <a href="gallery.php" class="sidebar-link">
                            <i class="bx bx-group"> </i> <span>Gallery</span></i>
                        </a>

                        <hr class="my-3">
                        <!--Sidebar Middle-->

                        <a href="account.php" class="sidebar-link">
                            <i class="bx bx-cog"> </i><span>Account Settings</span></i>
                        </a>
                        <hr class="my-3">
                        <!--Sidebar Bottom-->
                        <a href="../index.php" class="sidebar-link">
                            <i class="bx bx-log-out-circle"> </i> <span>Log Out</span></i>
                        </a>
                    </div>
                </div>
                <div class="content">
                    <div class="content-header d-flex align-items-center justify-content-between">
                        <h2 class="content-title">Gallery</h2>
                    </div>
                    <hr class="my-4">

                    <div class="statistics mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <h4 class="card-title">Gallery List</h4>
                                    <a href="tambah_gallery.php" class="btn btn-brown" style="background-color: #66320D; color:#ffff;"> <i class="bx bx-plus me-2"></i>Tambah </a>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>

                                                <th>No</th>
                                                <th>Gallery Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //menampilkan data gallery
                                            $batas = 8;
                                            if (!isset($_GET['halaman'])) {
                                                $posisi = 0;
                                                $halaman = 1;
                                            } else {
                                                $halaman = $_GET['halaman'];
                                                $posisi = ($halaman - 1) * $batas;
                                            }
                                            $sql_h = "select `kode_gallery`, `name_gallery`, `description_gallery`, `images_gallery` from `gallery`";
                                            if (isset($_GET["katakunci"])) {
                                                $katakunci_gallery = $_GET["katakunci"];
                                                $sql_h .= " where `name_gallery` LIKE '%$katakunci_gallery%'";
                                            }
                                            $sql_h .= "order by `name_gallery` DESC limit $posisi, $batas";
                                            $query_h = mysqli_query($koneksi, $sql_h);
                                            $no = 1;
                                            while ($data_h = mysqli_fetch_row($query_h)) {
                                                $kode_gallery = $data_h[0];
                                                $name_gallery = $data_h[1];
                                                $description_gallery = $data_h[2];
                                                $images_gallery = $data_h[3];



                                            ?>
                                                <tr>
                                                    <td width="5" data-label="No"><?php echo $no; ?></td>
                                                    <td width="10" data-label="Name_gallery"> <?php echo $name_gallery; ?></td>
                                                    <td width="15" data-label="Description_gallery"> <?php echo $description_gallery; ?></td>
                                                    <td width="50" data-label="Images_gallery">
                                                        <img src="../image/place/<?php echo $images_gallery; ?>" style="width: 100%;">
                                                    </td>
                                                    <td width="10" data-label="Aksi">
                                                        <a href="edit_gallery.php?data=<?php echo $kode_gallery; ?>" class="btn editbtn" style="border-color: #66320D; color:#66320D;"> <i class="fas fa-edit me-2"></i>Edit</a>
                                                        <a href="javascript:if(confirm('Anda yakin ingin menghapus data?
                  <?php echo $name_gallery; ?>?'))	window.location.href = 'gallery.php?aksi=hapus&data=<?php echo
                                                                                                            $kode_gallery; ?>'" class="btn deletebtn" style="border-color: #c72929; color:#c72929;"><i class="fas fa-trash me-2"></i>Delete</a>

                                                    <?php
                                                    $no++;
                                                } ?>
                                        </tbody>
                                    </table>
                                    <div class="card-footer clearfix">
                                        <?php
                                        //Menghitung jumlah
                                        $sql_jum = "SELECT `kode_gallery`,`name_gallery` FROM `gallery` order by `kode_gallery` ";
                                        $query_jum = mysqli_query($koneksi, $sql_jum);
                                        $jum_data = mysqli_num_rows($query_jum);
                                        $jum_halaman = ceil($jum_data / $batas);
                                        ?>
                                        <ul class="pagination pagination-sm m-0 float-right">
                                            <?php
                                            if ($jum_halaman == 0) {
                                                //tidak ada halaman
                                            } else if ($jum_halaman == 1) {
                                                echo "<li class='page-item'><a class='page-link'>1</a></li>";
                                            } else {
                                                $sebelum = $halaman - 1;
                                                $setelah = $halaman + 1;
                                                if (isset($_GET["katakunci"])) {
                                                    $katakunci_gallery = $_GET["katakunci"];
                                                    if ($halaman != 1) {
                                                        echo "<li class='page-item'><a class='page-link'
                        	href='gallery.php?katakunci=$katakunci_gallery&halaman=1'>
                        	First</a></li>";
                                                        echo "<li class='page-item'><a class='page-link'
                        	href='gallery.php?katakunci=$katakunci_gallery&halaman=$sebelum'> 18.		«</a></li>";
                                                    }
                                                    for ($i = 1; $i <= $jum_halaman; $i++) {
                                                        if ($i != $halaman) {
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?katakunci=$katakunci_gallery&halaman=$i'>
                                	$i</a></li>";
                                                        } else {
                                                            echo "<li class='page-item'>
                                	<a class='page-link'>$i</a></li>";
                                                        }
                                                    }
                                                    if ($halaman != $jum_halaman) {
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?katakunci=$katakunci_gallery&halaman=$setelah'>
                                		»</a></li>";
                                                        echo "<li class='page-item'><a class='page-link'
                                		href='gallery.php?katakunci=$katakunci_gallery&=$jum_halaman'>
                                		Last</a></li>";
                                                    }
                                                } else {
                                                    if ($halaman != 1) {
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?halaman=1'>First</a></li>";
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?halaman=$sebelum'>«</a></li>";
                                                    }
                                                    for ($i = 1; $i <= $jum_halaman; $i++) {
                                                        if ($i != $halaman) {
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?halaman=$i'>$i</a></li>";
                                                        } else {
                                                            echo "<li class='page-item'><a class='page-
                                	link'>$i</a></li>";
                                                        }
                                                    }
                                                    if ($halaman != $jum_halaman) {
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?halaman=$setelah'>»</a></li>";
                                                        echo "<li class='page-item'><a class='page-link'
                                	href='gallery.php?halaman=$jum_halaman'>Last</a></li>";
                                                    }
                                                }
                                            } ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>

        </div>
        <script src="vendors/jquery/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>


        <script>
            function sidebarMenu() {
                const sidebar = document.getElementById('sidebarMenu');
                sidebar.classList.toggle('active');
            }
        </script>

    </body>

</php>