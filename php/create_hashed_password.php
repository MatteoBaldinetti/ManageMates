<?php
    $password = "azerty";
    echo("$password");
    echo(password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]));
?>