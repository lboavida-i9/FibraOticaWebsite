<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <title>ExcellReader</title>
    <script src="../JS/ExcellReader.js"></script>
</head>

<body onload="OnLoad();">
    <?php
    include_once "Content/Navbar.html";
    ?>

    <a href='../Files/FibraOticaExcell.xlsx' target="_blank">Download</a>

    <input type="file" id="files" name="files"/>
</body>

<?php
include_once "Content/_scripts.html";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>

</html>