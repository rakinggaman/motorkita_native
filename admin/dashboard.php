<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_product = $_GET['data'];
        //hapus product
        $sql_dh = "delete from `product`
  	where `kode_product` = '$id_product'";
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
        <title>Dashboard</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="admin.css">

    </head>

    <style>
        /*# sourceMappingURL=style.css.map */
    </style>

    <body>

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
                            <a href="event.php" class="sidebar-link">
                                <i class="bx bx-wallet"> </i> <span>Events</span></i>
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
                            <h2 class="content-title">Dashboard</h2>
                        </div>
                        <hr class="my-4">
                        <div class="row statistics mt-4">
                            <!--Shopping Bag-->
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icons">
                                                <i class="bx bx-shopping-bag" style=" color: #FF8A60;"></i>
                                            </div>
                                            <span class="card-title">4</span>
                                        </div>
                                        <p class="m-0 text-secondary mt-4">Total Products</p>
                                    </div>
                                </div>
                            </div>
                            <!--Gallery-->
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icons">
                                                <i class="bx bx-pie-chart" style=" color: #603CB6;"></i>
                                            </div>
                                            <span class="card-title">10</span>
                                        </div>
                                        <p class="m-0 text-secondary mt-4">Total Gallery</p>
                                    </div>
                                </div>
                            </div>
                            <!--Customer-->
                            <div class="col-md-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icons">
                                                <i class="bx bx-group" style=" color: #219653;"></i>
                                            </div>
                                            <span class="card-title">5</span>
                                        </div>

                                        <p class="m-0 text-secondary mt-4">Total Events</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="statistics mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-5">
                                        <h4 class="card-title">Product List</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Products Name</th>
                                                    <th>Material</th>
                                                    <th>Price</th>
                                                    <th>Image</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //menampilkan data Product
                                                $batas = 8;
                                                if (!isset($_GET['halaman'])) {
                                                    $posisi = 0;
                                                    $halaman = 1;
                                                } else {
                                                    $halaman = $_GET['halaman'];
                                                    $posisi = ($halaman - 1) * $batas;
                                                }
                                                $sql_h = "select `kode_product`, `name_product`, `material_product`, `price_product`, `images_product` from `product`";
                                                if (isset($_GET["katakunci"])) {
                                                    $katakunci_product = $_GET["katakunci"];
                                                    $sql_h .= " where `name_product` LIKE '%$katakunci_product%'";
                                                }
                                                $sql_h .= "order by `name_product` DESC limit $posisi, $batas";
                                                $query_h = mysqli_query($koneksi, $sql_h);
                                                $no = 1;
                                                while ($data_h = mysqli_fetch_row($query_h)) {
                                                    $kode_product = $data_h[0];
                                                    $name_product = $data_h[1];
                                                    $material_product = $data_h[2];
                                                    $price_product = $data_h[3];
                                                    $images_product = $data_h[4];


                                                ?>
                                                    <tr>
                                                        <td data-label="No"><?php echo $no; ?></td>
                                                        <td data-label="Name_product"> <?php echo $name_product; ?></td>
                                                        <td data-label="Material_product"> <?php echo $material_product; ?></td>
                                                        <td data-label="Price_product">$ <?php echo $price_product; ?></td>
                                                        <td data-label="Images_product">
                                                            <img src="../image/"> <?php echo $images_product; ?>
                                                        </td>
                                                    <?php
                                                    $no++;
                                                } ?>
                                            </tbody>
                                        </table>
                                        <div class="card-footer clearfix">
                                            <?php
                                            //Menghitung jumlah
                                            $sql_jum = "SELECT `kode_product`,`name_product` FROM `product` order by `kode_product` ";
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
                                                        $katakunci_product = $_GET["katakunci"];
                                                        if ($halaman != 1) {
                                                            echo "<li class='page-item'><a class='page-link'
                        	href='product.php?katakunci=$katakunci_product&halaman=1'>
                        	First</a></li>";
                                                            echo "<li class='page-item'><a class='page-link'
                        	href='product.php?katakunci=$katakunci_product&halaman=$sebelum'> 18.		«</a></li>";
                                                        }
                                                        for ($i = 1; $i <= $jum_halaman; $i++) {
                                                            if ($i != $halaman) {
                                                                echo "<li class='page-item'><a class='page-link'
                                	href='product.php?katakunci=$katakunci_product&halaman=$i'>
                                	$i</a></li>";
                                                            } else {
                                                                echo "<li class='page-item'>
                                	<a class='page-link'>$i</a></li>";
                                                            }
                                                        }
                                                        if ($halaman != $jum_halaman) {
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='product.php?katakunci=$katakunci_product&halaman=$setelah'>
                                		»</a></li>";
                                                            echo "<li class='page-item'><a class='page-link'
                                		href='product.php?katakunci=$katakunci_product&=$jum_halaman'>
                                		Last</a></li>";
                                                        }
                                                    } else {
                                                        if ($halaman != 1) {
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='product.php?halaman=1'>First</a></li>";
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='product.php?halaman=$sebelum'>«</a></li>";
                                                        }
                                                        for ($i = 1; $i <= $jum_halaman; $i++) {
                                                            if ($i != $halaman) {
                                                                echo "<li class='page-item'><a class='page-link'
                                	href='product.php?halaman=$i'>$i</a></li>";
                                                            } else {
                                                                echo "<li class='page-item'><a class='page-
                                	link'>$i</a></li>";
                                                            }
                                                        }
                                                        if ($halaman != $jum_halaman) {
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='product.php?halaman=$setelah'>»</a></li>";
                                                            echo "<li class='page-item'><a class='page-link'
                                	href='product.php?halaman=$jum_halaman'>Last</a></li>";
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
    </body>

</php>