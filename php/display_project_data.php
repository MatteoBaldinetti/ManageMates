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
             <div class="row mt-5">
                <div class="col-md-6 d-flex justify-content-center">
                    <button type="submit" class="btn w-50 login-button text-white">Créer un sprint</button>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <button type="submit" class="btn w-50 login-button text-white">Supprimer un sprint</button>
                </div>';

    } catch(PDOException $event) {
        echo "Error: ".$event -> getMessage()."<br/>";
    }
?>