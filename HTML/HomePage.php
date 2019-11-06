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

<body onload="GetWorkingExample();">
    <?php
    include_once "Content/Navbar.html";
    ?>
    <div id="Receiver"></div>
    <h1>TESTE</h1>
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>