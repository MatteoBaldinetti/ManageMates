<?php
    require "redirect_headers.php";
    require "connect_db.php";

    $project_id = 1; // Get current project id

    try {
        $req = 'SELECT username FROM user WHERE user_id NOT IN (
                SELECT u.user_id FROM user AS u
                JOIN collaboration AS c ON c.user_id = u.user_id
                JOIN project AS p ON p.project_id = c.project_id
                WHERE p.project_id = :project_id);';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(":project_id", $project_id, PDO::PARAM_INT);
        $pdoreq -> execute();

        foreach ($pdoreq as $value) {
           echo  '<option value="' . $value['username'] . '">' . $value['username'] . '</option>';
        }

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>