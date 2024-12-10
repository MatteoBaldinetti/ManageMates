<?php
    session_start();
    require "redirect_headers.php";
    require "connect_db.php";

    $project_name = $_GET["projectName"];
    $description = $_GET["description"];
    $deadline = $_GET["deadline"] . " 23:59:59";
    $budget = $_GET["budget"];

    if (!isset($projectName, $description, $deadline, $budget)) {
        header($project_php);
    }

    try {
        $req = "INSERT INTO project(project_name, deadline, budget) VALUES (:project_name, :deadline, :budget);";

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $pdoreq -> bindParam(':deadline', $deadline, PDO::PARAM_STR);
        $pdoreq -> bindParam(':budget', $budget, PDO::PARAM_INT);
        $pdoreq -> execute();

        header($project_php);

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>