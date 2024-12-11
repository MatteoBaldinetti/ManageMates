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

        var_dump(value: $objectives);
        echo '<br/>';
        var_dump(value: $userStories);
        echo '<br/>';
        var_dump(value: $backlogs);

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>