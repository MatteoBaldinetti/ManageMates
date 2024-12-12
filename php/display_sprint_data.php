<?php    
    require "redirect_headers.php";
    require "connect_db.php";

    try {
        $req = 'SELECT * FROM `sprint` as s
                JOIN objective AS o ON o.sprint_id =' . $_POST["id"] . '
                JOIN userstory AS u ON u.sprint_id = ' . $_POST["id"] . '
                JOIN backlog AS b ON b.sprint_id = ' . $_POST["id"] . '
                WHERE s.sprint_id='. $_POST["id"] .';';
        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();

        $objectives = array();
        $userStories = array();
        $backlogs = array();

        foreach ($pdoreq as $value) {
            $objectives[] = [$value['objective_id'], $value['number'], $value['description']];
            $userStories[] = [$value['userstory_id'], $value['number'], $value['description']];
            $backlogs[] = [$value['task_id'], $value['userstory_id'], $value['priority'], $value['conception'], $value['acceptance_criteria'], $value['status']];
        }
        
        echo "<div class='mt-5 mb-3 w-50'>";

        echo "<button type='submit' class='btn w-100 login-button text-white' onclick='addInputObjective()'>Ajouter un objectif</button>";
        echo "<div id='formObjective'></div>";
        var_dump(value: $objectives);
        echo '<br/>';
    

        echo "<button type='submit' class='btn w-100 mt-5 login-button text-white'>Ajouter une userstory</button>";
        var_dump(value: $userStories);
        echo '<br/>';
    

        echo "<button type='submit' class='btn w-100 mt-5 login-button text-white'>Ajouter un backlog</button>";
        var_dump(value: $backlogs);
        
        echo "</div>";

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>