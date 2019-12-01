<?php
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "Login":
            session_start();
            $query = $db->prepare("select id FROM usersgeral WHERE password='" . hash("sha512", htmlspecialchars($_REQUEST["Password"])) . "'");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            $result = 'Password errada';

            foreach ($rs as $r) {                
                $_SESSION["idGeral"] = $r->id;
                $result  = 'success';
            }

            echo $result;
            break;
    }
}