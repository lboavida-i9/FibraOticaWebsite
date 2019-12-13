<?php
session_start();
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    if (!isset($_SESSION['idGeral']) && !isset($_SESSION["Token"])) {
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
        case "GetContent":
            $query = $db->prepare("SELECT conteudobackoffice.id, conteudobackoffice.nome, conteudobackoffice.descricao, ficheirosconteudobackoffice.nomedoficheiro
                                   FROM conteudobackoffice, ficheirosconteudobackoffice 
                                   WHERE conteudobackoffice.id = idconteudo
                                   ORDER BY id DESC");

            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            $ArrayContent = array();

            $idGetted = -1;
            foreach ($rs as $r) {

                if ($idGetted != $r->id) {
                    $idGetted = $r->id;
                    array_push($ArrayContent, array('id' => $r->id, 'nome' => $r->nome, 'descricao' => $r->descricao, 'Conteudo' => GetFilesContent($rs, $r->id)));
                }
            }
            echo json_encode($ArrayContent);
            break;
    }
}

function GetFilesContent($rs, $contentId)
{
    $ArrayContentRow = array();
    foreach ($rs as $r) {
        if ($contentId == $r->id) {
            array_push($ArrayContentRow, $r->nomedoficheiro);
        }
    }
    return $ArrayContentRow;
}
