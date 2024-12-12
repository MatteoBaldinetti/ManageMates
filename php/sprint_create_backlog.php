<?php
    require "redirect_headers.php";
    require "connect_db.php";

    $sprint_id = $_GET["id"];
    $userstory_id = $_GET["userstory"];
    $task = $_GET["task"];
    $priority = $_GET["priority"];
    $conception = $_GET["conception"];
    $acceptance_criteria = $_GET["acceptanceCriteria"];
    $status = $_GET["status"];

    try {
        $req = 'INSERT INTO task(description) VALUES (:task);
                INSERT INTO backlog(sprint_id, userstory_id, task_id, priority, conception, acceptance_criteria, status)
                SELECT :sprint_id, :userstory_id, MAX(task_id), :priority, :conception, :acceptance_criteria, :status FROM task;';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(":sprint_id", $sprint_id, PDO::PARAM_INT);
        $pdoreq -> bindParam(":userstory_id", $userstory_id, PDO::PARAM_INT);
        $pdoreq -> bindParam(":task", $task, PDO::PARAM_STR);
        $pdoreq -> bindParam(":priority", $priority, PDO::PARAM_INT);
        $pdoreq -> bindParam(":conception", $conception, PDO::PARAM_STR);
        $pdoreq -> bindParam(":acceptance_criteria", $acceptance_criteria, PDO::PARAM_STR);
        $pdoreq -> bindParam(":status", $status, PDO::PARAM_STR);
        $pdoreq -> execute();

        header($project_php);

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>