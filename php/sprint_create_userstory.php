<?php
    require "redirect_headers.php";
    require "connect_db.php";

    $description = $_GET["descriptionUserstory"];
    $sprint_id = $_GET["id"];

    try {
        $req = 'INSERT INTO userstory(sprint_id, description) VALUES (:sprint_id, :description);';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(":sprint_id", $sprint_id, PDO::PARAM_INT);
        $pdoreq -> bindParam(":description", $description, PDO::PARAM_STR);
        $pdoreq -> execute();

        //header($project_php);

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>