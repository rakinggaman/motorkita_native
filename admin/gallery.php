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
                        <a href="#" class="sidebar-link">
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

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Gallery Name</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
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