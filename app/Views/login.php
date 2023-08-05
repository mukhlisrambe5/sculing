<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sculing V.2 | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.min.css">
    <!--My adjusted css-->
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/mycss.css">

    <!-- css sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/sweetalert2/sweetalert2.min.css">
    <!-- sweetalert2 -->
    <script src="<?= base_url() ?>/public/plugins/sweetalert2/sweetalert2.min.js"></script>


</head>

<body class="bg-white">
    <div class=" section container">
        <div class="container-login">
            <div class="section center">
                <img src="<?= base_url('') ?>/public/image/login.png" alt="image" class="form-image login-image">
            </div>
            <div class="section mt-1 mb-3 text-center">
                <h1 class="text-bold">Sculing</h1>
                <h4>Silahkan Login</h4>
            </div>
            <?php
            $errors = validation_errors();
            if (session()->get('error')) {
                echo '<script type="text/javascript">';
                echo 'Swal.fire({
                    icon: "error",
                    title: "Gagal Login",
                    text: "Username atau Password salah !",
                    timer: 1500,
                });';
                echo ';</script>';
            }
            ?>
            <?= form_open('auth/cekLogin') ?>

            <div class="input-group mb-3 mt-2">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                    aria-label="Username" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
            </div>
            <p class="text text-danger ml-3">
                <?= isset($errors['username']) == isset($errors['username']) ? validation_show_error('username') : '' ?>
            </p>

            <div class=" input-group mb-3 mt-2">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                    aria-label="Password" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                </div>
            </div>
            <p class="text text-danger ml-3">
                <?= isset($errors['password']) == isset($errors['password']) ? validation_show_error('password') : '' ?>
            </p>

            <div class="container-login-btn center">
                <button type="submit" id="btn_login" class="btn btn-primary btn-block btn-lg login-button ">Log
                    in</button>
            </div>
            <?= form_close() ?>

        </div>
    </div>


    <!-- jQuery -->
    <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>

</body>

</html>