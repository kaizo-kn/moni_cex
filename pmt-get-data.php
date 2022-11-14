<?php
error_reporting(E_ALL);
$host = "localhost";
$database = "data-pmt";
        $username = "adminPMTPN4";
        $password = "PMTPN4#@!admin";
        $connect = mysqli_connect($host, $username, $password, $database);
        $query = 'select* from stok_sparepart_PMT';
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
                $return_arr[] = $row;
        }

echo json_encode($return_arr);
mysqli_close($connect);
?>