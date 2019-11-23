<?php
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
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
            session_start();
            $query = $db->prepare("INSERT INTO userstecnico(email, password, Nome) VALUES ('" . htmlspecialchars($_POST["EmailTecnico"]) . "','" . hash("sha512", htmlspecialchars($_POST["PasswordTecnico"])) . "', '" . htmlspecialchars($_POST["NomeTecnico"]) . "');");
            $query->execute();
            echo 'success';
            break;
        case "ChangeGeralPassword":
            $query = $db->prepare("UPDATE usersgeral SET password = '" . hash("sha512", htmlspecialchars($_POST["PasswordGeral"])) . "' WHERE 1");
            $query->execute();
            echo "Success";
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
            echo "Deleted with Success";
            break;
    }
}

function InsertContent()
{
    include("../PHP/DBConfig.php");
    $query = $db->prepare("INSERT INTO conteudobackoffice (nome, descricao) VALUES ('" . htmlspecialchars($_REQUEST["Titulo"]) . "','" . htmlspecialchars($_REQUEST["Descricao"]) . "');");
    $query->execute();

    $query = $db->prepare("SELECT LAST_INSERT_ID() AS id;");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id;
    }
}

function InsertFileContent($contentId, $fileName)
{
    include("../PHP/DBConfig.php");
    $query = $db->prepare("INSERT INTO ficheirosconteudobackoffice(idconteudo, nomedoficheiro) VALUES ('" . $contentId . "','" . $fileName . "')");
    $query->execute();
}

function GetNumberName()
{
    include("../PHP/DBConfig.php");

    $query = $db->prepare("SELECT * FROM ficheirosconteudobackoffice ORDER BY id DESC LIMIT 0, 1");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($rs as $r) {
        return $r->id + 1;
    }
}
