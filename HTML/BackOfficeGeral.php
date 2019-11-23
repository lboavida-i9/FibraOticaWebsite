<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <title>BackOffice Geral</title>
    <link rel="stylesheet" href="../PHP/Style.php/BackOfficeGeral.scss">
    <script src="../JS/BackOfficeGeral.js"></script>
</head>

<?php
include_once "../PHP/BackOfficeGeralHelper.php";
?>

<body onload="GetContent();">

    <?php
    include_once "Content/Navbar.html";
    include_once "Content/Loader.html";
    ?>
    <h1>BackOffice Geral</h1>

    <div id="Content">        
    </div>
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>