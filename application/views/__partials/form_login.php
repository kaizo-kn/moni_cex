<!DOCTYPE html>
<html lang="en" style="width: 100%;overflow:overlay;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height">

    <title><?= $page_title ?> - Moni Cex</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/img/icons/Logo_PTPN4.png" rel="icon">
    <link href="<?= base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Lobster&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- JS -->
    <script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/sweetalert2.all.js" crossorigin="anonymous"></script>


</head>

<style>
    .btn-toggle-password {
        position: absolute;
        top: 10%;
        right: 4px;
        width: 30px;
        height: 30px;
        border: none;
        background-color: transparent;
        z-index: 10;
    }

    .form-login-placeholder {
        display: block;
        position: absolute;
        z-index: 10;
        top: 7px;
        left: 3.5rem;
        transition: all ease-in-out 300ms;
        cursor: text;
    }

    /*bg animation*/


    .context {
        width: 100%;
        position: absolute;
        top: 50vh;

    }

    .context h1 {
        text-align: center;
        color: #fff;
        font-size: 50px;
    }


    .area {

        background: rgba(230, 255, 240, 0.92);
        width: 100%;
        height: 100vh;


    }

    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        /*background: linear-gradient(to left, #43dfa3, #2abb8b);*/
        border: solid 4px #2abb8b;
        animation: animate 25s linear infinite;
        bottom: -150px;
        backdrop-filter: blur(5px);

    }

    .circles li:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }


    .circles li:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }

    .circles li:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }

    .circles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }

    .circles li:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .circles li:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    .circles li:nth-child(7) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }

    .circles li:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }

    .circles li:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }

    .circles li:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }

    .circles li:nth-child(11) {
        left: 15%;
        width: 30px;
        height: 30px;
        animation-delay: 0s;
        animation-duration: 6s;
    }

    .circles li:nth-child(12) {
        left: 36%;
        width: 50px;
        height: 50px;
        animation-delay: 0s;
        animation-duration: 8s;
    }

    .circles li:nth-child(13) {
        left: 5%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 38s;
    }



    @keyframes animate {

        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }

    }
</style>

<body>
    <div class="area">
        <img style=" z-index: -2;
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;" src="<?= base_url() ?>assets/img/bg-pattern.png" alt="" srcset="">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li class='d-flex justify-content-center align-items-center'>
                <img style="object-fit: contain; width:5rem;height:auto" src="<?= base_url() ?>assets/img/icons/Logo_PTPN4.png" alt="" srcset="">
            </li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li class='d-flex justify-content-center align-items-center'>
                <img style="object-fit: contain; width:8rem;height:auto" src="<?= base_url() ?>assets/img/icons/logo_holding.png" alt="" srcset="">
            </li>
        </ul>

        <div id="backdrop" style="width:100%;height:100%" class="d-flex justify-content-center align-items-center">
            <div class="justify-content-center h-100 w-75 d-flex align-items-center">
                <div id='main' style="backdrop-filter: blur(8px);border: solid 1px lightgrey;background-color:#ffffffa8" class="p-4 rounded form-login">
                    <div class="section-title mb-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="mb-3" style="object-fit: contain; width:8rem;height:auto" src="<?= base_url() ?>assets/img/icons/logo_holding.png" alt="" srcset="">
                        </div>
                        <h5 class="subtitle">Monitoring Pekerjaan Lapangan Capex <br> (Capital Expenditure) PKS PTPN IV
                        </h5>
                    </div>
                    <form action="<?= base_url() ?>index.php/login/login_process" autocomplete="off" method="post">
                        <div class="form-group">
                            <div class="mb-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" class="input-group-text" id="basic-addon1"><i class="bi bi-person fw-bold "></i></span>
                                    </div>

                                    <input onblur="fieldFocus()" onfocus=" $(`#username-placeholder`).css('transform', 'translateY(-35px)')" type="text" name="username" class="form-control  login-form" id="username" aria-describedby="usernameHelp" required style="border-top-right-radius: 5px;border-bottom-right-radius:5px;" value="<?= $this->session->flashdata('username') ?>"><br>
                                    <label for="username" id="username-placeholder" class="form-login-placeholder text-muted">Nama
                                        Pengguna</label>
                                </div>
                            </div>
                            <div class="mb-3 mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;" class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                    </div>
                                    <input onblur="fieldFocus()" onfocus=" $(`#password-placeholder`).css('transform', 'translateY(-35px)')" id="password" type="password" name="password" class="form-control login-form" required style="border-top-right-radius: 5px;border-bottom-right-radius:5px;">
                                    <label for="password" id="password-placeholder" class="form-login-placeholder text-muted">Kata
                                        Sandi</label>
                                    <button onclick="$('#password').get(0).type==('text')?$('#password').get(0).type=('password'):$('#password').get(0).type=('text');$(this).toggleClass('text-primary')" type="button" class="btn-toggle-password bi bi-eye fs-6 fw-bold"></button>
                                    <br>
                                </div>
                            </div>
                            <button type="submit" class="btn mainbgc mt-4 float-end text-light fw-bold zoom-hover nb-shadow">Log
                                In</button>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    //Swal Toast
    var toastMixin = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    function fieldFocus() {
        if ($(`#password`).val() !== "") {
            $(`#password-placeholder`).css("transform", " translateY(-35px)")
        } else {
            $(`#password-placeholder`).css("transform", " translateY(0px)")
        }
        if ($(`#username`).val() !== "") {
            $(`#username-placeholder`).css("transform", " translateY(-35px)")
        } else {
            $(`#username-placeholder`).css("transform", " translateY(0px)")
        }
    }

    $(document).ready(function() {
        <?= $this->session->flashdata('message') ?>
    });
</script>

</html>