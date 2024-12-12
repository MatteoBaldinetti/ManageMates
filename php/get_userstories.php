<?php
    require "redirect_headers.php";
    require "connect_db.php";

    $sprint_id = $_POST["id"]; // Get current project id

    try {
        $req = 'SELECT u.userstory_id FROM userstory AS u WHERE u.sprint_id = :sprint_id;';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(":sprint_id", $sprint_id, PDO::PARAM_INT);
        $pdoreq -> execute();
        $i = 1;
        foreach ($pdoreq as $value) {
           echo  "<option value=" . $value["userstory_id"] . ">Userstory $i</option>";
           $i++;
        }

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>