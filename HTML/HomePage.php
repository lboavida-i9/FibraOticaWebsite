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
            <div class="Slidshow col-12 col-md-8">
                <img class="mySlides" src="https://cdn.pixabay.com/photo/2018/11/17/20/18/fiber-3821957__340.jpg" style="width:100%">
                <img class="mySlides" src="https://cdn.pixabay.com/photo/2014/01/16/10/36/fiber-optic-cable-246270__340.jpg" style="width:100%">
                <img class="mySlides" src="https://cdn.pixabay.com/photo/2018/01/08/17/37/luminescence-3069828__340.jpg" style="width:100%">
                <div class="overlay"></div>
            </div>
           <div class="col-12 col-md-4 Slidshow_imagens_cortadas">
                <div class="Div_imagens_cortadas">
                    <img src="https://image.shutterstock.com/image-photo/network-cables-closeup-fiber-optical-260nw-634322429.jpg" style="width:100%">
                </div>
                <div class="Div_imagens_cortadas">
                    <img src="https://image.shutterstock.com/image-photo/optical-fiber-260nw-449934169.jpg" style="width:100%">
                </div>
                <div class="Div_imagens_cortadas_3">
                    <img src="https://cdn.pixabay.com/photo/2016/07/14/02/01/fibre-1515964__340.jpg" style="width:100%">
                </div>
           </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 div_Video_e_texto">
                <video controls>
                    <source src="../Files/FilesSended/2.mp4" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
            <div class="col-12 col-md-6 div_Video_e_texto">
                <span class="span_Video_e_texto">
                    <h1>Lorem ipsum dolor</h1>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Viverra tellus in hac
                    habitasse platea dictumst. Aliquam id diam maecenas ultricies mi eget mauris
                    pharetra. Enim praesent elementum facilisis leo. Cum sociis natoque penatibus
                    et magnis dis parturient. Pellentesque pulvinar pellentesque habitant morbi
                    tristique senectus et. Quam adipiscing vitae
                </p>
            </div>
        </div>
    </div>

   
        
    
</body>
<?php
    include_once "Content/_Footer.html";
?>
<?php
include_once "Content/_scripts.html";
?>

</html>