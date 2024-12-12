<?php
    require "redirect_headers.php";
    require "connect_db.php";

    $collaborator = $_GET["collaborator"];
    $project_id = $_GET["project_id"];
    $role = 2; // Consulter le projet

    try {
        $req = "INSERT INTO collaboration(user_id, project_id, role) VALUES (:user_id, :project_id, :role);";

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(':user_id', $collaborator, PDO::PARAM_STR);
        $pdoreq -> bindParam(':project_id', $project_id, PDO::PARAM_INT);
        $pdoreq -> bindParam(':role', $role, PDO::PARAM_STR);
        $pdoreq -> execute();

        $pdoreq -> setFetchMode(PDO::FETCH_ASSOC);

        foreach ($pdoreq as $k) {
            if (password_verify($password, $k["password"])) {
                $_SESSION["user_id"] = $k["user_id"];
                $_SESSION["username"] = $k["username"];
                header($project_php);
                exit;
            }
        }

        header($index_php);

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>