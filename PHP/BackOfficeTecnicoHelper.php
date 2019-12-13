<?php
include("../PHP/DBConfig.php");
session_start();
if (!isset($_SESSION['idTecnico']) || !isset($_SESSION["Token"]) || Decript($_SESSION["Token"]) != "TokenAccessGranted") {
    header('location: ../HTML/LoginTecnico.php');
}