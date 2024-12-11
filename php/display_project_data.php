<?php
    require "redirect_headers.php";
    require "connect_db.php";

    try {
        $req = 'SELECT * FROM project WHERE project_id="' . $_POST['id'] . '";';
        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();

        foreach ($pdoreq as $value) {
            $projectNames = $value["project_name"];
        }
        
        echo '<h3 class="pt-4 pb-4 text-center">' . $projectNames . '</h3>
             <div id="containerFormSprint" class="row mt-5 d-flex justify-content-center">
                <div class="col-md-6 d-flex justify-content-center">
                    <button type="submit" class="btn w-50 login-button text-white" onclick="addInputSprint()">Créer un sprint</button>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <button type="submit" class="btn w-50 login-button text-white" onclick="getUsers()">Ajouter un collaborateur</button>
                </div>
                <div id=getId class="d-none">' . $_POST["id"] . '</div>
            </div>';
        
        $req = 'SELECT * FROM sprint WHERE project_id="' . $_POST['id'] . '";';
        $pdoreq = $connect -> prepare($req);
        $pdoreq -> execute();

        $i = 1;
        foreach ($pdoreq as $value) {
            echo '<div class="row mt-5 d-flex justify-content-center">
                    <div class="col-md-12 sprint-link pt-3 pb-3 shadow-sm text-center">
                        <a href="#" id="' . $value["sprint_id"] . '"class="text-black text-decoration-none" onclick="displaySprint(this)"><h4>Accéder au Sprint ' . $i . '</h4></a>
                    </div>
                </div>';
            $i++;
        }


    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>