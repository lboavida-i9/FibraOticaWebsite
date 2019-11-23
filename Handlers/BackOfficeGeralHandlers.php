<?php
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "GetContent":
            $query = $db->prepare("SELECT * FROM conteudobackoffice");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            $ArrayContent=array();

            foreach ($rs as $r) { 
                $arrayForeach = array();
                array_push($arrayForeach, array('id' => $r->id, 'nome' => $r->nome, 'descricao' => $r->descricao, 'Conteudo' => GetFilesContent($r->id)));

                array_push($ArrayContent, $arrayForeach);
            }
            echo json_encode($ArrayContent);
            break;
    }
}

function GetFilesContent($contentId)
{
    include("../PHP/DBConfig.php");
    $query = $db->prepare("SELECT * FROM ficheirosconteudobackoffice WHERE idconteudo='" . $contentId . "'");
    $query->execute();
    $rs = $query->fetchAll(PDO::FETCH_OBJ);
    return $rs;
    break;
}
