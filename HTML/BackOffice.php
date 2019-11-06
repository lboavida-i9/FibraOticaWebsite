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
</head>
<?php
include_once "../PHP/BackOfficeHelper.php";
?>
<body>
    <?php
    include_once "Content/Navbar.html";
    ?>    
    <h1>Documentos</h1>
    <button onclick="AddItem();">Add</button>
</body>
</html>