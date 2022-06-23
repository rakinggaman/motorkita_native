<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="asset/css/login.css" />


    <title>MotorKita | Login</title>
    <style>
        html {
            height: 100vh;
            width: 100vh;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: rgba(234, 93, 58, 0.259);
        }

        .title {
            color: white;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .9);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .7);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #66320D;
            font-size: 12px;
        }

        button {
            position: relative;
            padding: 10px 20px;
            color: black;
            font-size: 16px;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            border-radius: 12px;
            border: none;
        }

        button:hover {
            background: #66320D;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #66320D, 0 0 25px #66320D, 0 0 50px #66320D, 0 0 100px #66320D;
        }

        button span {
            position: absolute;
            display: block;
        }

        button span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #E7A302);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        button span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #E7A302);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        button span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #E7A302);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        button span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #E7A302);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,
            100% {
                bottom: 100%;
            }
        }
    </style>
</head>


<body>

    <div class="login-box mt-5">
        <h4 class="title text-center mb-5">Admin
            <a href="index.html" class="banner" style="text-decoration: none; color: #fff;"> Motor<span style="color: #66320D;">Kita</span></a>
        </h4>
        <?php if (!empty($_GET['gagal'])) { ?>
            <?php if ($_GET['gagal'] == "userKosong") { ?>
                <span class="text-danger"> Maaf Username Tidak Boleh Kosong</span>
            <?php } else if ($_GET['gagal'] == "passKosong") { ?>
                <span class="text-danger"> Maaf Password Tidak Boleh Kosong </span>
            <?php } else { ?>
                <span class="text-danger"> Maaf Username dan Password Anda Salah </span>
            <?php } ?>
        <?php } ?>

        <form action="konfirmasi_login.php" method="post">
            <div class="user-box">
                <input type="text" id="username" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" id="password" name="password" required="">
                <label>Password</label>
            </div>
            <button type="submit" name="login" value="login"><span></span>
                <span></span>
                <span></span>
                <span></span> Masuk </button>
        </form>
    </div>
    <?php if (!empty($_GET['gagal'])) { ?>
        <?php if ($_GET['gagal'] == "userKosong") { ?>
            <span class="text-danger"> Maaf Username Tidak Boleh Kosong</span>
        <?php } else if ($_GET['gagal'] == "passKosong") { ?>
            <span class="text-danger"> Maaf Password Tidak Boleh Kosong </span>
        <?php } else { ?>
            <span class="text-danger"> Maaf Username dan Password Anda Salah </span>
        <?php } ?>
    <?php } ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>