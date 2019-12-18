<?php
session_start();
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    if (!isset($_SESSION["idAdmin"]) && !isset($_SESSION["Token"])) {
        echo 'You have to Login First';
        return;
    } else {
        if (Decript($_SESSION["Token"]) != "TokenAccessGranted") {
            echo 'Youre token is incorrect';
            return;
        }
    }

    switch ($_REQUEST['action']) {
        case "AddContent":
            $contentId = InsertContent($db);

            for ($i = 0; $i < count($_FILES['InputFile']['name']); $i++) {
                $info = pathinfo($_FILES['InputFile']['name'][$i]);
                $ext = $info['extension']; // get the extension of the file
                $newname = GetNumberName($db) . "." . $ext;

                $target = '../Files/FilesSended/' . $newname;
                move_uploaded_file($_FILES['InputFile']['tmp_name'][$i], $target);

                InsertFileContent($contentId, $newname, $db);
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
        case "GetConteudo":
            $query = $db->prepare("SELECT * FROM conteudobackoffice");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
        case "DeleteTecnico":
            $query = $db->prepare("DELETE FROM userstecnico WHERE id = " . $_POST["IdTecnico"]);
            $query->execute();
            echo "Técnico apagado com successo";
            break;

        case "DeleteConteudo":
            // Foreach para apagar os ficheiros.
            foreach (GetConteudoFiles($_POST["IdConteudo"], $db) as $file) {
                if (file_exists("../Files/FilesSended/" . $file->nomedoficheiro)) {
                    unlink("../Files/FilesSended/" . $file->nomedoficheiro);
                }
            }
            $query = $db->prepare("DELETE FROM conteudobackoffice WHERE id= " . $_POST["IdConteudo"] . "; Delete from ficheirosconteudobackoffice where idconteudo = " . $_POST["IdConteudo"]);
            $query->execute();
            echo "Conteúdo apagado com successo";
            break;

        case "EditTecnico":
            $query = $db->prepare("UPDATE userstecnico SET email= '" . $_POST["EmailTecnico"] . "', Nome='" . $_POST["NomeTecnico"] . "' WHERE id='" . $_POST["IdTecnico"] . "'");
            $query->execute();
            echo "Técnico editado com successo";
            break;
        case "EditConteudo":
            $query = $db->prepare("UPDATE conteudobackoffice SET nome= '" . $_POST["TituloConteudo"] . "', descricao='" . $_POST["DescricaoConteudo"] . "' WHERE id='" . $_POST["IdConteudo"] . "'");
            $query->execute();
            echo "Conteudo editado com successo";
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

function InsertContent($db)
{
    $query = $db->prepare("INSERT INTO conteudobackoffice (nome, descricao) VALUES ('" . htmlspecialchars($_POST["Titulo"]) . "','" . htmlspecialchars($_POST["Descricao"]) . "');");
    $query->execute();

    $query = $db->prepare("SELECT LAST_INSERT_ID() AS id;");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id;
    }
}

function InsertFileContent($contentId, $fileName, $db)
{
    $query = $db->prepare("INSERT INTO ficheirosconteudobackoffice(idconteudo, nomedoficheiro) VALUES ('" . $contentId . "','" . $fileName . "')");
    $query->execute();
}

function GetNumberName($db)
{
    $query = $db->prepare("SELECT * FROM ficheirosconteudobackoffice ORDER BY id DESC LIMIT 0, 1");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id + 1;
    }
}

function GetConteudoFiles($id, $db)
{
    $query = $db->prepare("SELECT nomedoficheiro FROM ficheirosconteudobackoffice WHERE idconteudo = " . $id);
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    return $rs;
}
