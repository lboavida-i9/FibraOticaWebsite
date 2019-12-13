<?php
session_start();
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    if (!isset($_SESSION["idAdmin"]) && !isset($_SESSION["Token"])) {
        echo 'You have to Login First';
        return ;
    }
    else {
        if (Decript($_SESSION["Token"]) != "TokenAccessGranted") {
            echo 'Youre token is incorrect';
            return;
        }
    }

    switch ($_REQUEST['action']) {
        case "AddContent":
            $contentId = InsertContent();

            for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                $info = pathinfo($_FILES['InputFile']['name'][$i]);
                $ext = $info['extension']; // get the extension of the file
                $newname = GetNumberName() . "." . $ext;

                $target = '../Files/FilesSended/' . $newname;
                move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);

                InsertFileContent($contentId, $newname);
            }
            header("Location: {$_SERVER['HTTP_REFERER']}");
            break;
        case "CreateAccount":
            $query = $db->prepare("INSERT INTO userstecnico(email, password, Nome) VALUES ('" . htmlspecialchars($_POST["EmailTecnico"]) . "','" . hash("sha512", htmlspecialchars($_POST["PasswordTecnico"])) . "', '" . htmlspecialchars($_POST["NomeTecnico"]) . "');");
            $query->execute();
            echo 'Conta criada com successo';
            break;
        case "ChangeGeralPassword":
            $query = $db->prepare("UPDATE usersgeral SET password = '" . hash("sha512", htmlspecialchars($_POST["PasswordGeral"])) . "' WHERE 1");
            $query->execute();
            echo "Password Geral alterada com successo";
            break;
        case "GetTecnicos":
            $query = $db->prepare("SELECT id, Nome, email FROM userstecnico");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "DeleteTecnico":
            $query = $db->prepare("DELETE FROM userstecnico WHERE id = " . $_POST["IdTecnico"]);
            $query->execute();
            echo "Técnico apagado com successo";
            break;
        case "EditTecnico":
            $query = $db->prepare("UPDATE userstecnico SET email= '" . $_POST["EmailTecnico"] . "', Nome='" . $_POST["NomeTecnico"] . "' WHERE id='" . $_POST["IdTecnico"] . "'");
            $query->execute();
            echo "Técnico editado com successo";
            break;
        case "ReadExcell":
            $Result = $_POST["result"];

            $QueryString = "INSERT INTO conteudoexcell ( Nome, Problema, Idade ) VALUES";

            $contador = 0;
            foreach ($Result as $r) {
                if ($contador > 0) {
                    $QueryString = $QueryString . ',';
                }

                $QueryString = $QueryString . "('" . $r["Nome"] . "', '" . $r["Problema"] . "', " . $r["Idade"] . ")";
                $contador++;
            }

            $QueryString = $QueryString . ";";
            $query = $db->prepare($QueryString);
            $query->execute();
            
            echo 'Conteúdo do excell adicionado com successo';
            break;
    }
}

function InsertContent() {
    include("../PHP/DBConfig.php");
    $query = $db->prepare("INSERT INTO conteudobackoffice (nome, descricao) VALUES ('" . htmlspecialchars($_POST["Titulo"]) . "','" . htmlspecialchars($_POST["Descricao"]) . "');");
    $query->execute();

    $query = $db->prepare("SELECT LAST_INSERT_ID() AS id;");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id;
    }
}

function InsertFileContent($contentId, $fileName) {
    include("../PHP/DBConfig.php");
    $query = $db->prepare("INSERT INTO ficheirosconteudobackoffice(idconteudo, nomedoficheiro) VALUES ('" . $contentId . "','" . $fileName . "')");
    $query->execute();
}

function GetNumberName() {
    include("../PHP/DBConfig.php");

    $query = $db->prepare("SELECT * FROM ficheirosconteudobackoffice ORDER BY id DESC LIMIT 0, 1");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id + 1;
    }
}
