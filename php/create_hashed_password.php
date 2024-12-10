<?php
    $password = "azerty";
    echo("$password<br>");
    echo(password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]));
?>
