<?php
include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "ReadExcell":
            $Result = $_POST["result"];
            
            $QueryString = "INSERT INTO conteudoexcell ( Nome, Problema, Idade ) VALUES";
            
            $contador=0;
            foreach ($Result as $r) {
                if($contador > 0)
                {
                    $QueryString = $QueryString . ',';
                }

                $QueryString = $QueryString . "('" . $r["Nome"] . "', '" . $r["Problema"] . "', " . $r["Idade"] . ")";
                $contador++;
            }

            $QueryString = $QueryString . ";";
            $query = $db->prepare($QueryString);
            $query->execute();            
            break;
    }
}
