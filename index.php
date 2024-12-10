<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="./css/style.css" rel="stylesheet">
        <title>ManageMates | Connexion</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-5 blue-bg"> </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <img class="d-block mx-auto mt-3 mb-3" src="./assets/images/logo.webp" height="35%"/>
                    <div class="d-block mx-auto" style="width: 30vw;">
                        <h2 class="text-center blue-txt">Connexion</h2>
                        <form method="post" action="php/connect.php">
                            <div class="mb-3"> 
                                <label for="id" class="form-label">Identifiant</label>
                                <input type="text" class="form-control" name="login" id="id" placeholder="Ex : leon.smith">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" class="form-check-input" id="checkbox" onclick="changeVisibilityPassword()">
                                <label class="form-check-label" for="checkbox">Afficher le mot de passe</label>
                            </div>
                            <button type="submit" class="btn w-100 login-button text-white">Se connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/login.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <?php
            require "php/redirect_headers.php";
            if (empty($_SESSION)) {
                session_start();
            }

            if (isset($_SESSION["user_id"])) {
                header($project_php);
            }
        ?>
    </body>
</html>