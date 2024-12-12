<?php
    require "redirect_headers.php";
    require "connect_db.php";

    $sprint_id = $_POST["id"]; // Get current project id

    try {
        $req = 'SELECT u.number FROM `userstory` AS u WHERE u.sprint_id = :sprint_id;';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(":sprint_id", $sprint_id, PDO::PARAM_INT);
        $pdoreq -> execute();

        foreach ($pdoreq as $value) {
           echo  '<option value="' . $value['number'] . '">Userstory ' . $value['number'] . '</option>';
        }

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>