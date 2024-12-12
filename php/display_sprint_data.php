<?php    
    require "redirect_headers.php";
    require "connect_db.php";

    try {
        $req = 'SELECT * FROM `objective` WHERE sprint_id ='. $_POST["id"] .';';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();

        $objectives = array();
        $userStories = array();
        $backlogs = array();

        foreach ($pdoreq as $value) {
            $objectives[] = [$value['objective_id'], $value['sprint_id'], $value['description']];
        }
        
        echo "<h3 class='mt-5'>Listes des objectifs</h3>";
        echo "<button type='submit' class='btn w-50 mt-3 login-button text-white' style='display: block; margin: auto;' onclick='addInputObjective()'>Créer un objectif</button>";
        echo "<div id='formObjective'></div>";
        echo "<ul class='mt-3 fs-5'>";
        foreach ($objectives as $value) {
            echo "<li>" . $value[2] . "</li>";
            echo "<br/>";
        }
        echo "</ul>";


        $req = 'SELECT * FROM `userstory` WHERE sprint_id ='. $_POST["id"] .';';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();

        $i = 1;
        foreach ($pdoreq as $value) {
            $userStories[] = [$i, $value['sprint_id'], $value['description']];
            $i++;
        }

        echo "<h3 class='mt-5'>Liste des userstories</h3>";
        echo "<button type='submit' class='btn w-50 mt-3 login-button text-white' style='display: block; margin: auto;' onclick='addInputUserstory()'>Créer une userstory</button>";
        echo "<div id='formUserstory'></div>";
        echo "<table class='table table-hover mt-3 w-75 mx-auto'>
                <tr><th>ID</th><th>Description</th></tr>";
        foreach ($userStories as $value) {
            echo "<tr>
                    <td>Userstory " . $value[0] . "</td>
                    <td>" . $value[2] . "</td>
                </tr>";
        }
        echo "</table>";
    

        $req = 'SELECT b.sprint_id, b.userstory_id, t.description, b.priority, b.conception, b.acceptance_criteria, b.status FROM backlog AS b JOIN task AS t ON t.task_id = b.task_id WHERE sprint_id ='. $_POST["id"] .' ORDER BY t.task_id;';

        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();
        
        $i = 1;
        foreach ($pdoreq as $value) {
            $backlogs[] = [$value['sprint_id'], $i, $value['description'], $value['priority'], $value['conception'], $value['acceptance_criteria'], $value['status']];
            $i++;
        }

        echo "<h3 class='mt-5'>Liste des backlogs</h3>";
        echo "<button type='submit' class='btn w-50 mt-3 login-button text-white' style='display: block; margin: auto;' onclick='getUserstories()'>Créer un backlog</button>";
        echo "<div id='formBacklog'></div>";   
        echo "<table class='table table-hover mt-3'>
                <tr><th>Userstory</th><th>Tâche</th><th>Priorité</th><th>Critères d'acceptation</th><th>Conception</th><th>État</th></tr>";
        foreach ($backlogs as $value) {
            echo "<tr>
                    <td>Userstory " . $value[1] . "</td>
                    <td>" . $value[2] . "</td>
                    <td>" . $value[3] . "</td>
                    <td>" . $value[5] . "</td>
                    <td>" . $value[4] . "</td>
                    <td>" . $value[6] . "</td>
                </tr>";
        }
        echo "</table>";


    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>