<?php
session_start();
if (!isset($_SESSION['idGeral'])) {
    header('location: ../HTML/LoginGeral.php');
}