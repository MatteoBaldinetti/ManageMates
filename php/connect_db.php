<?php
    $host = "localhost";
    $dbname = "managemates";
    $user = "root";
    $password = "";

    try {
        //Création d'un objet connexion
        $connect = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $password);
        //Définition du niveau de gestion d'erreur
        $connect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $event) {
        echo "<div class='table3'>Error: ".$event -> getMessage()."<br/></div>";
    }
?>