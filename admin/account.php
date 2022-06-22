<?php
include('../koneksi/koneksi.php');
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_gallery = $_GET['data'];
        //hapus 
        $sql_dh = "delete from `gallery`
  	where `id_admin` = '$id_gallery'";
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
        <title>Account</title>
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
                        <h2 class="content-title">Akun Setting</h2>
                    </div>

                    <div class="statistics mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <h4 class="card-title">Admin</h4>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>username</th>
                                                <th>email</th>
                                                <th>Password</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //menampilkan data admin
                                            $batas = 8;
                                            if (!isset($_GET['halaman'])) {
                                                $posisi = 0;
                                                $halaman = 1;
                                            } else {
                                                $halaman = $_GET['halaman'];
                                                $posisi = ($halaman - 1) * $batas;
                                            }
                                            $sql_h = "select `id_admin`, `nama`, `username`, `email`, `password` from `admin`";
                                            if (isset($_GET["katakunci"])) {
                                                $katakunci_admin = $_GET["katakunci"];
                                                $sql_h .= " where `nama` LIKE '%$katakunci_gallery%'";
                                            }
                                            $sql_h .= "order by `nama` DESC limit $posisi, $batas";
                                            $query_h = mysqli_query($koneksi, $sql_h);
                                            $no = 1;
                                            while ($data_h = mysqli_fetch_row($query_h)) {
                                                $id_admin = $data_h[0];
                                                $nama = $data_h[1];
                                                $username = $data_h[2];
                                                $email = $data_h[3];
                                                $password = $data_h[4];
                                            ?>
                                                <tr>
                                                    <td width="5" data-label="No"><?php echo $no; ?></td>
                                                    <td width="10" data-label="Nama"> <?php echo $nama; ?></td>
                                                    <td width="15" data-label="Username"> <?php echo $username; ?></td>
                                                    <td width="15" data-label="Email"> <?php echo $email; ?></td>
                                                    <td width="50" data-label="Password"><?php echo $password; ?>
                                                    </td>
                                                    <td width="10" data-label="Aksi">
                                                    <?php
                                                    $no++;
                                                } ?>
                                        </tbody>
                                    </table>

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