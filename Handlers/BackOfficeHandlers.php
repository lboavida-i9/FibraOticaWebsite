<?php
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetDocuments":
            session_start();
            $query = $db->prepare("select id FROM users WHERE email='" . htmlspecialchars($_REQUEST["Email"]) . "' AND password='" . hash("sha512", htmlspecialchars($_REQUEST["Password"])) . "'");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            $result = 'Email ou Password errados';

            foreach ($rs as $r) {
                $_SESSION["id"] = $r->id;
                $result  = 'success';
            }

            echo $result;
            break;
        case "AddContent":
            $info = pathinfo($_FILES['InputFile']['name']);
            $ext = $info['extension']; // get the extension of the file
            $newname = "newname." . $ext;

            $target = '../Files/' . $newname;
            move_uploaded_file($_FILES['InputFile']['tmp_name'], $target);
            break;
    }
}
