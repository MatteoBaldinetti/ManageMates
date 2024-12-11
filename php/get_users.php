<?php
    require "redirect_headers.php";
    require "connect_db.php";

    try {
        $req = 'SELECT username FROM user';
        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();

        foreach ($pdoreq as $value) {
           echo  '<option value="' . $value['username'] . '">' . $value['username'] . '</option>';
        }

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>