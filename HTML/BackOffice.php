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

    <h1>Documentos</h1>
    <div id="DivDocumentsGetted" onload="GetDocuments();"></div>
    <button onclick="AddItem();">Add</button>

</body>

<?php
include_once "Content/_scripts.html";
?>

</html>