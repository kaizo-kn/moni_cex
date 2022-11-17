<?php
error_reporting(E_ALL);
$host = "localhost";
$database = "data-pmt";
        $username = "root";
        $password = "";
        $connect = mysqli_connect($host, $username, $password, $database);
        $query = 'select* from stok_sparepart_PMT';
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
                $return_arr[] = $row;
        }

echo($return_arr);
mysqli_close($connect);
?>