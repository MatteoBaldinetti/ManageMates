<?php
    $password = "admin";
    echo("$password<br>");
    echo(password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]));
?>
