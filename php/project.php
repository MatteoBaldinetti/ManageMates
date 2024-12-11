<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet">
        <title>ManageMates | Projets</title>
    </head>
    <body>
        <?php
            include "redirect.php";
        ?>
        <div class="container-fluid">
            <div class="row blue-bg">
                <div class="col-9"></div>
                <div class="col-1 white-bg">
                    <img class="d-block mx-auto" src="../assets/images/logo.webp" height="auto" width="80%">
                </div>
                <div class="col-2">
                    <div class="position-relative">
                        <p class="text-white">Prénom NOM</p>
                        <img src=""/>
                    </div>
                </div>
            </div>
            <div class="row" style="height: 93vh">
                <div class="col-1 dark-grey-bg p-0" style="width: 5%;">
                    <div class="pt-4"></div>
                    <div class="active-link pt-2 pb-2">
                        <a href="#"><img class="d-block mx-auto" width="40%" src="../assets/images/project.svg"></a>
                    </div>
                    <div class="pt-3 pb-3">
                        <a href="#"><img class="d-block mx-auto" width="30%"  src="../assets/images/valide.svg"></a>
                    </div>
                    <div class="pt-3 pb-3">
                        <a href="#"><img class="d-block mx-auto" width="30%" src="../assets/images/calendar.svg"></a>
                    </div>
                    <div class="pt-3 pb-3">
                        <a href="#"><img class="d-block mx-auto" width="40%" src="../assets/images/collaboration.svg"></a>
                    </div>
                    <div class="pt-3 pb-3">
                        <a href="#"><img class="d-block mx-auto" width="50%" src="../assets/images/setting.svg"></a>
                    </div>
                </div>
                <div class="col-2 light-grey-bg">
                    <h4 class="pt-4 pb-4 text-center text-white">Mes projets</h4>
                    <?php
                        require "redirect_headers.php";
                        require "connect_db.php";
                    
                        try {
                            $req = "SELECT * FROM project;";
                    
                            $pdoreq = $connect -> prepare($req);
                            $pdoreq -> execute();
                    
                            $projectNames = array();
                            $projectStartTimes = array();
                            $projectDeadlines = array();
                            $projectBudgets = array();

                            foreach ($pdoreq as $value) {
                                $projectNames[] = $value["project_name"];
                                $projectStartTimes[] = $value["start_time"];
                                $projectDeadlines[] = $value["deadline"];
                                $projectBudgets[] = $value["budget"];
                            }
                            
                            foreach ($projectNames as $value) {
                                echo '<p class="text-center text-white mb-3 project-link"><a href="#" class="text-decoration-none text-white">' . $value . '</a></p>';
                            }

                        } catch(PDOException $event) {
                            echo "Error: ".$event -> getMessage()."<br/>";
                        }
                    ?>
                    <h4 class="pt-4 pb-3 text-center text-white">Créer un projet</h4>
                    <div class="text-center mb-3">
                        <a id="addProjectButton" style="cursor: pointer;">
                            <svg viewBox="-3.2 -3.2 38.40 38.40" width="25%" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(9.6,9.6), scale(0.4)"><rect x="-3.2" y="-3.2" width="38.40" height="38.40" rx="19.2" fill="#FFFFFF" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ffffff" stroke-width="0.064"></g><g id="SVGRepo_iconCarrier"> <title>plus-circle</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-466.000000, -1089.000000)" fill="#2F2F2F"> <path d="M488,1106 L483,1106 L483,1111 C483,1111.55 482.553,1112 482,1112 C481.447,1112 481,1111.55 481,1111 L481,1106 L476,1106 C475.447,1106 475,1105.55 475,1105 C475,1104.45 475.447,1104 476,1104 L481,1104 L481,1099 C481,1098.45 481.447,1098 482,1098 C482.553,1098 483,1098.45 483,1099 L483,1104 L488,1104 C488.553,1104 489,1104.45 489,1105 C489,1105.55 488.553,1106 488,1106 L488,1106 Z M482,1089 C473.163,1089 466,1096.16 466,1105 C466,1113.84 473.163,1121 482,1121 C490.837,1121 498,1113.84 498,1105 C498,1096.16 490.837,1089 482,1089 L482,1089 Z" id="plus-circle" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>                
                        </a>
                    </div>
                </div>
                <div id="mainContainer" class="col-9 justify-content-center" style="flex: 1;">
                    <div>
                        <h3 class="pt-4 pb-4 text-center">Nom du projet</h3>
                        <p class="text-center">Description du projet</p>
                        <p class="text-center mt-5">Liste des sprints</p>
                        <div class="row mt-5">
                            <div class="col-md-6 d-flex justify-content-center">
                                <button type="submit" class="btn w-50 login-button text-white">Créer un sprint</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center">
                                <button type="submit" class="btn w-50 login-button text-white">Supprimer un sprint</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/addProject.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>