<?php
    session_start();
    require "connect_db.php";
    require "redirect_headers.php";

    $login = $_POST["login"];
    $password = $_POST["password"];

    if (!isset($login, $password) || $login == '' || $password == '') {
        header($index_php);
    }

    try {
        $req = "SELECT user_id, username, password FROM user WHERE user_id=:login;";

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> bindParam(':login', $login, PDO::PARAM_STR);
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