<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <title>BackOffice</title>
    <link rel="stylesheet" href="../PHP/Style.php/BackOffice.scss">
    <script src="../JS/BackOffice.js"></script>
</head>

<?php
include_once "../PHP/BackOfficeHelper.php";
?>

<body>
    <?php
    include_once "Content/Navbar.html";
    ?>
    
    <input type="file" id="files" name="files"/>
</body>

<?php
include_once "Content/_scripts.html";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>

</html>