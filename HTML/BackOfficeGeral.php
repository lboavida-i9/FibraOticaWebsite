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
    <div class="mb-5">
        <h1>BackOffice Geral</h1>
        <select id="SortBy" onchange="ChangedSortValue()">
            <option value="all">TODOS</option>
            <option value="0">MEO</option>
            <option value="1">VODAFONE</option>
        </select>
    </div>    

    <div id="Content">        
    </div>
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>