<?php
session_start();
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    if (!isset($_SESSION['idTecnico']) && !isset($_SESSION["Token"])) {
        echo 'You have to Login First';
        return;
    }
    else {
        if (Decript($_SESSION["Token"]) != "TokenAccessGranted") {
            echo 'Youre token is incorrect';
            return;
        }
    }

    switch ($_REQUEST['action']) {

    }
}
