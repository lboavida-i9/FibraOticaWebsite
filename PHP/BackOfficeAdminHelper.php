<?php
include("../PHP/DBConfig.php");
session_start();
if (!isset($_SESSION["idAdmin"]) || !isset($_SESSION["Token"]) || Decript($_SESSION["Token"]) != "TokenAccessGranted") {
    header('location: ../HTML/LoginAdmin.php');
}