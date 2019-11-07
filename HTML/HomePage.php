<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <link rel="stylesheet" href="../PHP/Style.php/Homepage.scss">
    <script src="../JS/HomePage.js"></script>
    <title>Homepage</title>
</head>

<?php
include_once "../PHP/HomePageHelper.php";
?>

<body onload="OnLoad()">
    <?php
    include_once "Content/Navbar.html";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="Slidshow col-8">
                <img class="mySlides" src="https://www.w3schools.com/w3css/img_ny.jpg" style="width:100%">
                <img class="mySlides" src="https://www.w3schools.com/w3css/img_la.jpg" style="width:100%">
                <img class="mySlides" src="https://www.w3schools.com/w3css/img_chicago.jpg" style="width:100%">
                <div class="overlay"></div>
            </div>
           <div class="col-4 Slidshow_imagens_cortadas">
                <div class="Div_imagens_cortadas">
                    <img src="https://www.w3schools.com/w3css/img_chicago.jpg" style="width:100%">
                </div>
                <div class="Div_imagens_cortadas">
                    <img src="https://www.w3schools.com/w3css/img_chicago.jpg" style="width:100%">
                </div>
                <div class="Div_imagens_cortadas_3">
                    <img src="https://www.w3schools.com/w3css/img_chicago.jpg" style="width:100%">
                </div>
           </div>
        </div>
    </div>
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>