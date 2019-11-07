<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <title>SpeedTester</title>
    <script src="../JS/ExcellReader.js"></script>
</head>

<body>
    <?php
    include_once "Content/Navbar.html";
    ?>

</body>

<?php
include_once "Content/_scripts.html";
?>

<div style="text-align:right;">
    <div style="min-height:360px;">
        <div style="width:100%;height:0;padding-bottom:calc(50% - 40px);position:relative;">
            <iframe style="border:none;position:absolute;top:0;left:0;width:100%;height:100%;min-height:360px;border:none;overflow:hidden !important;" src="//www.metercustom.net/plugin/?th=w"></iframe>
        </div>
    </div>
    <div class="mr-2"> Provided by <a href="https://www.meter.net"> Meter.net</a> </div>
</div>

</html>