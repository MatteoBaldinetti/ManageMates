<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kanban Board</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/kanban.css">
    </head>
    <body>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-3 ms-3 red-header">
                    <p class="header">A faire</p>
                </div>
                <div class="col-3 mx-5 orange-header">
                    <p class="header">En cours</p>
                </div>
                <div class="col-3 me-3 green-header">
                    <p class="header">Fini</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3 col-drag ms-3" id="ready" ondrop="drop(event)" ondragover="allowdrop(event)">
                    <p class="task" id="task1" draggable="true" ondragstart="drag(event)">Task 1</p>
                    <p class="task" id="task2" draggable="true" ondragstart="drag(event)">Task 2</p>
                    <p class="task" id="task3" draggable="true" ondragstart="drag(event)">Task 3</p>
                    <p class="task" id="task4" draggable="true" ondragstart="drag(event)">Task 4</p>
                    <p class="task" id="task5" draggable="true" ondragstart="drag(event)">Task 5</p>
                </div>
                <div class="col-3 col-drag mx-5" id="in-progress" ondrop="drop(event)" ondragover="allowdrop(event)"></div>
                <div class="col-3 col-drag me-3" id="finish" ondrop="drop(event)" ondragover="allowdrop(event)"></div>
            </div>
        </div>
        <script src="../js/kanban.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>