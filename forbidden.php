<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden</title>
</head>

<body style="overflow: hidden;">
    <div style="margin:5%;margin-bottom:0px;display:flex;justify-content:center;">
        <img width="50%" height="50%" src="assets/images/forbidden.webp" alt="forbidden" srcset="">
        
    </div>
    <form  style="display:flex;justify-content:center;" action="index.php" method="post">
            <button style="border:solid 5px grey;border-radius:20px;cursor:pointer;font-size:1.3em;font-weight:bold;color:black;width:max-content;height:max-content;padding:14px;background-color:lightgreen;" type="submit">Kembali ke Halaman Utama</button>

        </form>
</body>

</html>
<?php 
if(isset($_SESSION)){
   session_destroy();  
}
?>