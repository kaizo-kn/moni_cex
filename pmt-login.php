
<?php
session_start();
$usernamelogin = 'adminPMTPN4';
$passwordlogin = 'PMTPN4#@!admin';
$username = $_POST['username'];
$password = $_POST['password'];
if (!isset($username) || !isset($password)) {
    session_destroy();
    header("Location: forbidden.php");
} else {
    if ($username == $usernamelogin && $password == $passwordlogin) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['msg'] = '<div class="alert alert-info w-100">Selamat Datang Admin PMT</div>';
        header("Location: pmt-edit-table.php");
    } else {
        $_SESSION['msg'] = '<div class="alert alert-danger w-100">Nama Pengguna atau Kata Sandi Salah</div>';
        header("Location: info_stok_sparepart.php?");
    }
}
?>
