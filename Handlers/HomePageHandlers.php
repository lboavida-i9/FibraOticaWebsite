<?php
/*This file is too 'talk' with the Database*/

include("../PHP/DBConfig.php");
if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case "SelectAll":
            session_start();
            $query = $db->prepare("SELECT * FROM YoutTable");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($rs);
            break;
 
        case "UpdateDeleteInsert":
            session_start();
            $query = $db->prepare("UPDATE YourTable SET Nome = 'NewName' WHERE id = 1");
            $query->execute();
            echo "Success";
            break;
 
        case "SelectWithForeach":
            session_start();
            $query = $db->prepare("SELECT * FROM YourTable");
            $query->execute();
            $rs = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($rs as $r) {
                echo $r->Nome;
            }
            break;
 
        case "WorkingExample":
           session_start();
           /* In here put the query */
           //Returning a test value
           echo '<p>This value is being returned by the Handler<p>';
        break;
    }
}