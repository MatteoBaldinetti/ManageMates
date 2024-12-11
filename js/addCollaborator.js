var j = 0;

function addInputCollaborator(response) {
    if (j == 0) {
        if (i == 1) {
            document.getElementById('formDiv').remove();
            i = 0;
        }

        let containerFormSprint = document.getElementById("containerFormSprint");
        let newForm = document.createElement("form");
        newForm.method = "get";
        newForm.id= 'formDiv' 
        newForm.action='../php/sprint_create.php'; //changer le fichier
        newForm.class='mt-4 p-3 w-50 lighter-grey-bg shadow-sm rounded';
        newForm.style='height: fit-content; width: 50%;';
        newForm.innerHTML = "<div class='mt-5 mb-3'><label for='collaborator' class='form-label'>Liste des utilisateurs disponible</label><select name='collaborator' id='collaborator' class='form-select' aria-label='Default select example'><option selected='selected'>Choisir un nom</options>" + response + "</select></div><button type='submit' class='btn w-100 login-button text-white'>Ajouter l'utilisateur au projet</button>";
        containerFormSprint.appendChild(newForm);
        j = 1;
    }
}

function getUsers() {
    $.ajax({
        type: "POST",
        url: "../php/get_users.php",
      })
        .done(function( response ) {
            $("p.broken").html(response);
            addInputCollaborator(response);
    });
}