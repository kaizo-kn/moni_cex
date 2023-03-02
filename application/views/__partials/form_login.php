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



.Atom {
    width: 80px;
    height: 80px;
    position: relative;
    border-radius: 50%;
    padding: 10px;
}

.Atom-nucleus,
.Atom-nucleus:before {
    position: absolute;
    background: linear-gradient(-180deg, #0adef3 0%, #45beff 100%);
}

.Atom-nucleus {
    display: block;
    content: "";
    width: 30px;
    height: 30px;
    margin-left: -15px;
    margin-top: -15px;
    border-radius: 50%;
    top: 50px;
    left: 50px;
    box-shadow: 0 0 12px 4px rgba(10, 222, 243, 0.6);
    z-index: 2;
}

.Atom-nucleus:before {
    display: block;
    content: "";
    width: 54px;
    height: 54px;
    margin-left: -27px;
    margin-top: -27px;
    border-radius: 50%;
    top: 15px;
    left: 15px;
    opacity: 0.1;
}

.Atom-orbit {
    position: absolute;
    width: 80px;
    height: 80px;
    border: solid 4px transparent;
    transform-style: preserve-3d;
}

.Atom-orbit--visible {
    border-radius: 50%;
    border-color: white;
}

.Atom-electron {
    transform-style: preserve-3d;
}

.Atom-electron:before {
    display: block;
    content: "";
    width: 24px;
    height: 24px;
    margin-left: -12px;
    margin-top: -12px;
    border-radius: 50%;
    position: absolute;
    top: 40px;
    left: 40px;
}

.Atom-electron:after {
    display: block;
    content: "";
    width: 12px;
    height: 12px;
    margin-left: -6px;
    margin-top: -6px;
    border-radius: 50%;
    position: absolute;
    top: 40px;
    left: 40px;
    border-color: rgba(255, 255, 255, 0.4);
}

.Atom-orbit--top.Atom-orbit--visible {
    transform: rotateZ(0deg) rotateY(70deg);
}

.Atom-orbit--top.Atom-orbit--foreground {
    transform: translateZ(100px) rotateZ(0deg) rotateY(70deg);
}

@-webkit-keyframes rotate-top {
    0% {
        transform: rotate(0deg) translate(-40px) rotate(0deg);
    }

    100% {
        transform: rotate(360deg) translate(-40px) rotate(-360deg);
    }
}

@keyframes rotate-top {
    0% {
        transform: rotate(0deg) translate(-40px) rotate(0deg);
    }

    100% {
        transform: rotate(360deg) translate(-40px) rotate(-360deg);
    }
}

@-webkit-keyframes zind-left {
    0% {
        z-index: 1;
    }

    49% {
        z-index: 1;
    }

    50% {
        z-index: 3;
    }

    100% {
        z-index: 3;
    }
}

@keyframes zind-left {
    0% {
        z-index: 1;
    }

    49% {
        z-index: 1;
    }

    50% {
        z-index: 3;
    }

    100% {
        z-index: 3;
    }
}

@-webkit-keyframes zind-right {
    0% {
        z-index: 3;
    }

    49% {
        z-index: 3;
    }

    50% {
        z-index: 1;
    }

    100% {
        z-index: 1;
    }
}

@keyframes zind-right {
    0% {
        z-index: 3;
    }

    49% {
        z-index: 3;
    }

    50% {
        z-index: 1;
    }

    100% {
        z-index: 1;
    }
}

@-webkit-keyframes zind-top {
    0% {
        z-index: 1;
    }

    24% {
        z-index: 1;
    }

    25% {
        z-index: 3;
    }

    75% {
        z-index: 3;
    }

    76% {
        z-index: 1;
    }
}

@keyframes zind-top {
    0% {
        z-index: 1;
    }

    24% {
        z-index: 1;
    }

    25% {
        z-index: 3;
    }

    75% {
        z-index: 3;
    }

    76% {
        z-index: 1;
    }
}

.Atom-orbit--top {
    -webkit-animation: zind-top infinite linear;
    animation: zind-top infinite linear;
    -webkit-animation-duration: 1.2s;
    animation-duration: 1.2s;
}

.Atom-orbit--top .Atom-electron {
    -webkit-animation: rotate-top infinite linear;
    animation: rotate-top infinite linear;
    -webkit-animation-duration: 1.2s;
    animation-duration: 1.2s;
    transform: rotate(0deg) translate(-40px) rotate(0deg);
}

.Atom-orbit--top .Atom-electron:before,
.Atom-orbit--top .Atom-electron:after {
    transform: rotateY(-70deg) rotateZ(0deg);
}

.Atom-orbit--top .Atom-electron:before {
    background: linear-gradient(-180deg, #fad161 0%, #f99337 100%);
    opacity: 0.2;
}

.Atom-orbit--top .Atom-electron:after {
    background: linear-gradient(-180deg, #fad161 0%, #f99337 100%);
    box-shadow: 0px 0px 5px 0px #fad161;
}

.Atom-orbit--left.Atom-orbit--visible {
    transform: rotateZ(-60deg) rotateY(70deg);
}

.Atom-orbit--left.Atom-orbit--foreground {
    transform: translateZ(100px) rotateZ(-60deg) rotateY(70deg);
}

@-webkit-keyframes rotate-left {
    0% {
        transform: rotate(60deg) translate(-40px) rotate(-60deg);
    }

    100% {
        transform: rotate(420deg) translate(-40px) rotate(-420deg);
    }
}

@keyframes rotate-left {
    0% {
        transform: rotate(60deg) translate(-40px) rotate(-60deg);
    }

    100% {
        transform: rotate(420deg) translate(-40px) rotate(-420deg);
    }
}

@keyframes zind-left {
    0% {
        z-index: 1;
    }

    49% {
        z-index: 1;
    }

    50% {
        z-index: 3;
    }

    100% {
        z-index: 3;
    }
}

@keyframes zind-right {
    0% {
        z-index: 3;
    }

    49% {
        z-index: 3;
    }

    50% {
        z-index: 1;
    }

    100% {
        z-index: 1;
    }
}

@keyframes zind-top {
    0% {
        z-index: 1;
    }

    24% {
        z-index: 1;
    }

    25% {
        z-index: 3;
    }

    75% {
        z-index: 3;
    }

    76% {
        z-index: 1;
    }
}

.Atom-orbit--left {
    -webkit-animation: zind-left infinite linear;
    animation: zind-left infinite linear;
    -webkit-animation-duration: 1.5s;
    animation-duration: 1.5s;
}

.Atom-orbit--left .Atom-electron {
    -webkit-animation: rotate-left infinite linear;
    animation: rotate-left infinite linear;
    -webkit-animation-duration: 1.5s;
    animation-duration: 1.5s;
    transform: rotate(60deg) translate(-40px) rotate(-60deg);
}

.Atom-orbit--left .Atom-electron:before,
.Atom-orbit--left .Atom-electron:after {
    transform: rotateY(-70deg) rotateZ(60deg);
}

.Atom-orbit--left .Atom-electron:before {
    background: linear-gradient(-180deg, #69ee75 0%, #68CC87 100%);
    opacity: 0.2;
}

.Atom-orbit--left .Atom-electron:after {
    background: linear-gradient(-180deg, #69ee75 0%, #68CC87 100%);
    box-shadow: 0px 0px 5px 0px #69ee75;
}

.Atom-orbit--right.Atom-orbit--visible {
    transform: rotateZ(60deg) rotateY(70deg);
}

.Atom-orbit--right.Atom-orbit--foreground {
    transform: translateZ(100px) rotateZ(60deg) rotateY(70deg);
}

@-webkit-keyframes rotate-right {
    0% {
        transform: rotate(120deg) translate(-40px) rotate(-120deg);
    }

    100% {
        transform: rotate(480deg) translate(-40px) rotate(-480deg);
    }
}

@keyframes rotate-right {
    0% {
        transform: rotate(120deg) translate(-40px) rotate(-120deg);
    }

    100% {
        transform: rotate(480deg) translate(-40px) rotate(-480deg);
    }
}

@keyframes zind-left {
    0% {
        z-index: 1;
    }

    49% {
        z-index: 1;
    }

    50% {
        z-index: 3;
    }

    100% {
        z-index: 3;
    }
}

@keyframes zind-right {
    0% {
        z-index: 3;
    }

    49% {
        z-index: 3;
    }

    50% {
        z-index: 1;
    }

    100% {
        z-index: 1;
    }
}

@keyframes zind-top {
    0% {
        z-index: 1;
    }

    24% {
        z-index: 1;
    }

    25% {
        z-index: 3;
    }

    75% {
        z-index: 3;
    }

    76% {
        z-index: 1;
    }
}

.Atom-orbit--right {
    -webkit-animation: zind-right infinite linear;
    animation: zind-right infinite linear;
    -webkit-animation-duration: 3s;
    animation-duration: 3s;
}

.Atom-orbit--right .Atom-electron {
    -webkit-animation: rotate-right infinite linear;
    animation: rotate-right infinite linear;
    -webkit-animation-duration: 3s;
    animation-duration: 3s;
    transform: rotate(120deg) translate(-40px) rotate(-120deg);
}

.Atom-orbit--right .Atom-electron:before,
.Atom-orbit--right .Atom-electron:after {
    transform: rotateY(-70deg) rotateZ(-60deg);
}

.Atom-orbit--right .Atom-electron:before {
    background: linear-gradient(-180deg, #992dd8 0%, #7034AF 100%);
    opacity: 0.2;
}

.Atom-orbit--right .Atom-electron:after {
    background: linear-gradient(-180deg, #992dd8 0%, #7034AF 100%);
    box-shadow: 0px 0px 5px 0px #992dd8;
}

.nameplate {
    font-family: sans-serif;
    padding-left: 10px;
    opacity: 0.5;
}

.nameplate span {
    font-size: small;
    opacity: 0.5;
    font-style: italic;
}

.nameplate h2 {
    margin: -3px 0;
    font-weight: normal;
}


.loader {
    display: flex;
    height: 100%;
    flex: 1 1 100%;
    justify-content: center;
    align-items: center;
}
 </style>

 <body
     style="background-image: url(<?php echo base_url(); ?>assets/img/teh.jpg);height:100vh;background-position:center;"
     class="mt-0">
     <div id="backdrop" style="width:100%;height:100%;backdrop-filter: blur(5px);">



         <div class="justify-content-center h-100 d-flex align-items-center">
             <div class="bg-light p-4 rounded form-login">
                 <div class="section-title mb-0">
                     <div style="transform:translateX(-35px)" class="loader">
                         <div class="Atom">
                             <div class="Atom-nucleus"></div>
                             <div class="Atom-orbit Atom-orbit--left Atom-orbit--foreground">
                                 <div class="Atom-electron"></div>
                             </div>
                             <div class="Atom-orbit Atom-orbit--right Atom-orbit--foreground">
                                 <div class="Atom-electron"></div>
                             </div>
                             <div class="Atom-orbit Atom-orbit--top Atom-orbit--foreground">
                                 <div class="Atom-electron"></div>
                             </div>
                         </div>
                         <h3 style="transform:translateY(12px)" class="subtitle">Selamat datang kembali</h3>
                     </div>
                 </div>
                 <form action="<?= base_url() ?>index.php/login/login_process" autocomplete="off" method="post">
                     <div class="form-group">
                         <div class="mb-5">
                             <div class="input-group">
                                 <div class="input-group-prepend">
                                     <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;"
                                         class="input-group-text" id="basic-addon1"><i
                                             class="bi bi-person fw-bold "></i></span>
                                 </div>

                                 <input onblur="fieldFocus('username')"
                                     onfocus=" $(`#username-placeholder`).css('transform', 'translateY(-35px)')"
                                     type="text" name="username" class="form-control  login-form" id="username"
                                     aria-describedby="usernameHelp" required
                                     style="border-top-right-radius: 5px;border-bottom-right-radius:5px;"
                                     value="<?= $this->session->flashdata('username') ?>"><br>
                                 <label for="username" id="username-placeholder" class="form-login-placeholder">Nama
                                     Pengguna</label>
                             </div>
                         </div>
                         <div class="mb-3 mt-3">
                             <div class="input-group">
                                 <div class="input-group-prepend">
                                     <span style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;"
                                         class="input-group-text" id="basic-addon1"
                                         style="border-top-right-radius: 5px;border-bottom-right-radius:5px;"><i
                                             class="bi bi-lock"></i></span>
                                 </div>
                                 <input onblur="fieldFocus('password')"
                                     onfocus=" $(`#password-placeholder`).css('transform', 'translateY(-35px)')"
                                     id="password" type="password" name="password" class="form-control login-form"
                                     required>
                                 <label for="password" id="password-placeholder" class="form-login-placeholder">Kata
                                     Sandi</label>
                                 <button
                                     onclick="$('#password').get(0).type==('text')?$('#password').get(0).type=('password'):$('#password').get(0).type=('text');$(this).toggleClass('text-primary')"
                                     type="button" class="btn-toggle-password bi bi-eye fs-6 fw-bold"></button>
                                 <br>
                             </div>
                         </div>
                         <button type="submit"
                             class="btn mainbgc mt-4 float-end text-light fw-bold zoom-hover nb-shadow">Log In</button>
                     </div>
                     <?php echo form_close(); ?>
             </div>
         </div>
     </div>

     <script>
     function fieldFocus(id) {
         if ($(`#${id}`).val() !== "") {
             $(`#${id}-placeholder`).css("transform", " translateY(-35px)")
         } else {
             $(`#${id}-placeholder`).css("transform", " translateY(0px)")
         }
     }

     $(document).ready(function() {
         setTimeout(() => {
             $('#password').val('')
             $('#username').val('')
         }, 500);
     });
     </script>