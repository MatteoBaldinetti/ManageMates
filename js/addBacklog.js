var n = 0;

function addInputBacklog(response) {
    if (n == 0) {
        let containerFormBacklog = document.getElementById("formBacklog");
        let newForm = document.createElement("form");
        newForm.method = "get";
        newForm.id= 'formDiv' 
        newForm.action='../php/sprint_create_backlog.php';
        newForm.class='mt-4 p-3 w-50 lighter-grey-bg shadow-sm rounded';
        newForm.style='height: fit-content; width: 50%;';
        newForm.innerHTML = "<div class='mt-5 mb-3'><label for='userstory' class='form-label'>Liste des userstories</label><select name='userstory' id='userstory' class='form-select' aria-label='Default select example'><option selected='selected'>Choisir une userstory</options>" + response + "</select><label for='task' class='form-label mt-3'>Description de la tâche</label><textarea rows=5 class='form-control' name='task' id='task' required></textarea><label for='priority' class='form-label mt-3'>Priorité de la tâche</label><input type='number' class='form-control' name='priority' min=1 required><label for='acceptanceCriteria' class='form-label mt-3'>Critère d'acceptation</label><textarea rows=5 class='form-control' name='acceptanceCriteria' id='acceptanceCriteria' required></textarea><label for='conception mt-3' class='form-label'>Moyen de conception</label><textarea rows=5 class='form-control' name='conception' id='conception' required></textarea><label for='status' class='form-label mt-3'>État d'avancement</label><select class='form-select' name='status' aria-label='Default select example'><option selected value='A faire'>A faire</option><option value='En cours'>En cours</option><option value='Fini'>Fini</option></select><input type='number' class='form-control d-none' name='id' value='" + idSprint + "' required></div><button type='submit' class='btn w-100 login-button text-white'>Ajouter l'userstory</button>";
        containerFormBacklog.appendChild(newForm);
        n = 1;
    }
}

function getUserstories() {
    $.ajax({
        type: "POST",
        url: "../php/get_userstories.php",
        data: {id: idSprint}
      })
        .done(function( response ) {
            $("p.broken").html(response);
            addInputBacklog(response);
    });
}