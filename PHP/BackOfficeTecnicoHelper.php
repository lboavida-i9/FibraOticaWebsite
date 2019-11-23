<?php
session_start();
if (!isset($_SESSION['idTecnico'])) {
    header('location: ../HTML/LoginTecnico.php');
}