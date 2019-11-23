<?php
session_start();
if (!isset($_SESSION["idAdmin"])) {
    header('location: ../HTML/LoginAdmin.php');
}