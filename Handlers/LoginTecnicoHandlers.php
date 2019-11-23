<?php
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "Login":
            session_start();
            $query = $db->prepare("select id FROM userstecnico WHERE email='" . htmlspecialchars($_REQUEST["Email"]) . "' AND password='" . hash("sha512", htmlspecialchars($_REQUEST["Password"])) . "'");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            $result = 'Email ou Password errados';

            foreach ($rs as $r) {                
                $_SESSION["idTecnico"] = $r->id;
                $result  = 'success';
            }

            echo $result;
            break;
    }
}