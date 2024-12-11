<?php
    session_start();
    require "redirect_headers.php";
    require "connect_db.php";

    $deadline = $_GET["deadline"] . " 23:59:59";
    $id = $_GET["id"];

    if (!isset($deadline, $id)) {
        header($project_php);
    }
    try {
        $req = "INSERT INTO sprint(project_id, deadline) VALUES (:project_id, :deadline);";

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(':deadline', $deadline, PDO::PARAM_STR);
        $pdoreq -> bindParam(':project_id', $id, PDO::PARAM_STR);
       
        $pdoreq -> execute();

        header($project_php);

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>