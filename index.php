<?php
include('./koneksi/koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <Link rel="stylesheet" href="style/style.css">
    </Link>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title> MotorKita | Website</title>
</head>
<style>
    .box {
        max-width: 100%;
        max-height: 100%;
        margin: 0 auto;
        text-align: center;
        position: fixed;
    }

    .button {
        display: inline-block;
        margin-top: 40px;
        text-decoration: none;
        border: 1px solid black;
        padding: 4px;
        font-size: 2rem;
        color: black;
        box-shadow: 0 5px 7px rgba(0, 0, 0, 0.5);
        transition: all 0.6s;
    }

    .button:hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .popup {
        height: 100vh;
        width: 100%;
        padding: 50px;
        position: fixed !important;
        justify-content: center;
        left: 0;
        top: 0;
        background-color: white;
        background-width: 10%;
        transform: scale(0);
        opacity: 0;
        visibility: hidden;
        transition: all 0.7s;
        z-index: 999;
    }

    .popup:target {
        transform: scale(1);
        opacity: 1;
        visibility: visible;
        position: fixed;
    }

    .close {
        text-decoration: none;
        font-size: 4rem;
        color: darkgray;
        position: fixed;
        top: 20px;
        right: 20px;
    }

    .close:hover {
        color: white;
    }

    .close p {
        color: white;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#"><span>Motor</span>Kita</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#event">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>

                </ul>
                <a href="./login.php" class="btn btn-brown py-2 px-5">LOGIN</a>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <section class="hero" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Explore the amazing place with the best Club.</h1>
                    <p class="mt-4 mb-5">we are here to make many people in this country happy! let's come and join us
                    </p>
                    <a href="#partnership" class="btn btn-brown py-2 px-5">Explore Now</a>
                </div>
                <div class="col-md-6 mt-3">
                    <img src="image/header-image.png" alt="" class="hero-img">
                </div>
            </div>
        </div>
    </section>
    <!--  Partnership -->
    <div class="container" id="partnership">
        <div class="statistic">
            <div class="statistic-items d-flex align-items-center justify-content-center gap-5">
                <div class="statistic-item text-center col-md-3">
                    <h4 class="statistic-title"> <img src="image/honda.png" alt="" class="partnership"></h4>

                </div>

                <div class="statistic-item text-center col-md-3">
                    <h4 class="statistic-title"><img src="image/bmw.png" alt="" class="partnership"></h4>

                </div>

                <div class="statistic-item text-center col-md-3">
                    <h4 class="statistic-title"><img src="image/kyt.png" alt="" class="partnership"></h4>

                </div>

            </div>
        </div>
    </div>
    <!-- About Us -->
    <section class="hero" id="about">
        <div class="container">
            <h2 class="section-title text-center mb-5">About Us</h2>
            <div class="row align-items-center">
                <div class="col-md-6 mt-3">
                    <img src="image/about-image.png" alt="" class="hero-img w-75">
                </div>
                <div class="col-md-6">
                    <h1>Motor<span style="color: #66320D;">Kita.</span></h1>
                    <p class="mt-4 mb-5">Charteing tent turkey exchange rate worldwide spa hotspot overnight rural. Flexibility cab USA expedia locals country. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad praesentium eius, tempora nesciunt, ipsam eligendi
                        quo quia commodi saepe laborum, eveniet ut repellat voluptas corporis. Delectus eligendi assumenda deserunt quisquam. </p>
                    <a href="#popup" class="btn btn-brown py-2 px-5">More..</a>
                </div>

            </div>
        </div>
    </section>
    <div class="popup" id="popup">
        <a href="#box" class="btn-close float-end"></a>
        <img src="asset/img/Official_Final_Full 1.png" alt="" class="kesan-img">
        <div class="visi ">
            <h1>Vision : </h1>
            <p>Become The Best Motor Club in This Country
            </p>
        </div>
        <div class="pesan mt-5">
            <h1>Mission :</h1>
            <p>1. Make us Safe</p>
            <p>2. Enjoying Riding Motor</p>
            <p>3. Make The Community Comfortable</p>
            <p>4. Sharing Many Knowledge</p>
        </div>
    </div>



    <!-- Service -->
    <section class="service" id="service">
        <div class="container">
            <h2 class="section-title text-center">Our Services</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card border-0 text-center card-service">
                        <div class="card-body">
                            <img src="image/icons/ic-select.svg" alt="">
                            <h3>Upgrade</h3>
                            <p>Upgrade your equipment <br> and and get a good vibes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 text-center card-service">
                        <div class="card-body">
                            <img src="image/icons/ic-choose.svg" alt="">
                            <h3>Choose a guide</h3>
                            <p>Guide by locals who love to share <br> their experience with you</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 text-center card-service">
                        <div class="card-body">
                            <img src="image/icons/ic-request.svg" alt="">
                            <h3>Community</h3>
                            <p>Join the community <br> and make many relations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Products -->
    <section class="service" id="product">
        <div class="container">
            <h2 class="section-title text-center">Featured Products</h2>

            <div class="row mt-5">
                <?php
                $sql_h = "select * from product";
                $query_h = mysqli_query($koneksi, $sql_h);
                while ($data_h = mysqli_fetch_row($query_h)) {
                    $kode_product = $data_h[0];
                    $name_product = $data_h[1];
                    $material_product = $data_h[2];
                    $price_product = $data_h[3];
                    $images_product = $data_h[4];

                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card mb-4">
                            <img src="./image/<?php echo $images_product; ?>" class="card-img-top">
                            <div class="card-body ">
                                <div class="d-flex align-items-center gap-5">
                                    <h4 class="card-title "><?php echo $name_product; ?></h4>
                                </div>
                                <div class="d-flex align-items-center gap-3 mt-2">
                                    <div class="icons">
                                        <i class='bx bx-shape-square' style="font-size: 24px;"></i>
                                    </div>
                                    <span><?php echo $material_product; ?></span>
                                </div>
                                <div class="d-flex align-items-center gap-3 mt-1">
                                    <i class='bx bx-dollar' style="font-size: 24px;"></i>
                                    <span><?php echo $price_product; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </section>
    <!--Gallery-->
    <section class="service" id="gallery">
        <div class="container">
            <h2 class="section-title text-center">Our Gallery</h2>
            <div class="row mt-5">
                <?php
                $sql_h = "select * from gallery";
                $query_h = mysqli_query($koneksi, $sql_h);
                while ($data_h = mysqli_fetch_row($query_h)) {
                    $kode_gallery = $data_h[0];
                    $name_gallery = $data_h[1];
                    $description_gallery = $data_h[2];
                    $images_gallery = $data_h[3];


                ?>
                    <div class="col-md-4 mb-5">
                        <div class="card border-0 card-service card-destination" style="background-image: url('image/place/<?php echo $images_gallery; ?>');">
                            <div class="card-body">
                                <div class="content">
                                    <h3><?php echo $name_gallery; ?></h3>
                                    <p><?php echo $description_gallery; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>
    </section>


    <!-- CTA -->
    <section class="cta" id="contact">
        <div class="container">
            <div class="row align-items-center p-5" style="background: rgba(242, 100, 64, 0.03);">
                <div class="col-md-8">
                    <h2 class="section-title">Have You Any Question?</h2>
                    <p class="section-description mt-5">If you have any questions or need any help please inform us, <br> we will help you as soon as possible</p>
                    <p class="section-description mt-3">(0335)422338 | Ig : MotorKita | Fb : MotorKita GO</p>

                </div>
                <div class="col">
                    <a href="mailto:motorkita@gmail.com" class="btn btn-brown py-4 px-5 mt-5 float-end ">SEND EMAIL</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="footer-brand" href="#">Motor<span>Kita</span></a>
                    <p class="footer-text mt-2">Comfortable and spacious club with many humble people and cool.</p>
                    <p class="footer-text mt-2">Jakarta | Pahlawan No. 112</p>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-md-3">
                            <h5 class="footer-title text-white">Products</h5>
                            <ul class="footer-list mt-2">
                                <li><a href="#">Overview</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Tutorials</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Releases</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="footer-title text-white">Company</h5>
                            <ul class="footer-list mt-2">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Partners</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="footer-title text-white">Support</h5>
                            <ul class="footer-list mt-2">
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Terms of service</a></li>
                                <li><a href="#">Legal</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Status</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h5 class="footer-title text-white">Follow us</h5>
                            <ul class="footer-list mt-2">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Dribbble</a></li>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">LinkedIn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js " integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js " integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13 " crossorigin="anonymous "></script>
    -->
</body>

</html>