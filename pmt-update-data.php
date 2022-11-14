<?php

use function PHPSTORM_META\type;

function dateUpdate()
{
        $locale = 'id_ID';
        $dateObj = new DateTime;
        $formatter = new IntlDateFormatter(
                $locale,
                IntlDateFormatter::FULL,
                IntlDateFormatter::SHORT
        );
        $cDate = $formatter->format($dateObj);
        return substr($cDate, 0, -6) . " pukul " . substr($cDate, -5) . " WIB";
}

function check($array)
{
        foreach ($array as $value) {
                if (!is_numeric($value)) {
                        return false;
                }
        }
        return true;
}

$host = "localhost";
$database = "data-pmt";
        $username =$_POST['username'];
        $password =$_POST['password'];
        $tanggal_update =dateUpdate();
        $lori_rebusan = $_POST['lori_rebusan'];
        $fruit_elevator = $_POST['fruit_elevator'];
        $as_thresher = $_POST['as_thresher'];
        $tromol_thresher = $_POST['tromol_thresher'];
        $body_cbc = $_POST['body_cbc'];
        $gantungan_cbc = $_POST['gantungan_cbc'];
        $pedal_cbc = $_POST['pedal_cbc'];
        $body_polishdrum = $_POST['body_polishdrum'];
        $roll_body_polishdrum = $_POST['roll_body_polishdrum'];
        $roll_bawah_polishdrum = $_POST['roll_bawah_polishdrum'];
        $gear_polishdrum = $_POST['gear_polishdrum'];
        $dewatering_drum = $_POST['dewatering_drum'];
        $bottom_cone_inti = $_POST['bottom_cone_inti'];
        $bottom_cone_cangkang = $_POST['bottom_cone_cangkang'];
        $vortex_finder = $_POST['vortex_finder'];
        $feed_housing = $_POST['feed_housing'];
        $body_cyclone = $_POST['body_cyclone'];
        $separating_cyclone = $_POST['separating_cyclone'];
        $box_control = $_POST['box_control'];
$roda_lori = $_POST['roda_lori'];
        $bushing_lori = $_POST['bushing_lori'];
$query="";
        $arrVal = array(
                $lori_rebusan,
                $fruit_elevator,
                $as_thresher,
                $tromol_thresher,
                $body_cbc,
                $gantungan_cbc,
                $pedal_cbc,
                $body_polishdrum,
                $roll_body_polishdrum,
                $roll_bawah_polishdrum,
                $gear_polishdrum,
                $dewatering_drum,
                $bottom_cone_inti,
                $bottom_cone_cangkang,
                $vortex_finder,
                $feed_housing,
                $body_cyclone,
                $separating_cyclone,
                $box_control,
            $roda_lori,
                $bushing_lori
        );

        if (check($arrVal) == true) {
                $query = "UPDATE `stok_sparepart_PMT` 
        SET `tanggal_update` ='$tanggal_update',
        `lori_rebusan` = '$lori_rebusan', 
        `fruit_elevator` = '$fruit_elevator', 
        `as_thresher` = '$as_thresher', 
        `tromol_thresher` = '$tromol_thresher', 
        `body_cbc` = '$body_cbc', 
        `gantungan_cbc` = '$gantungan_cbc', 
        `pedal_cbc` = '$pedal_cbc', 
        `body_polishdrum` = '$body_polishdrum', 
        `roll_body_polishdrum` = '$roll_body_polishdrum', 
        `roll_bawah_polishdrum` = '$roll_bawah_polishdrum', 
        `gear_polishdrum` = '$gear_polishdrum', 
        `dewatering_drum` = '$dewatering_drum', 
        `bottom_cone_inti` = '$bottom_cone_inti', 
        `bottom_cone_cangkang` = '$bottom_cone_cangkang', 
        `vortex_finder` = '$vortex_finder', 
        `feed_housing` = '$feed_housing', 
        `body_cyclone` = '$body_cyclone', 
        `separating_cyclone` = '$separating_cyclone', 
        `box_control` = '$box_control',
        `roda_lori` = '$roda_lori',
        `bushing_lori` = '$bushing_lori'
          WHERE  `id` = '1'";
                $connect = mysqli_connect($host, $username, $password, $database);
                if(!mysqli_query($connect, $query)){
                  $return_arr['message'] = mysqli_error(($connect));
                }else{
                $return_arr['message'] = 'Success';}
          echo json_encode($return_arr);
        } else {
                $return_arr['message'] = "Input Contain non-Numerical Value!";
          echo json_encode($return_arr);
        }
mysqli_close($connect);

?>