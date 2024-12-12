var k = 0;

function addInputObjective() {
    if (k == 0) {
        let containerFormObjective = document.getElementById("formObjective");
        let newForm = document.createElement("form");
        newForm.method = "get";
        newForm.id= 'formDiv' 
        newForm.action='../php/sprint_create.php'; //changer le fichier
        newForm.class='mt-4 p-3 w-50 lighter-grey-bg shadow-sm rounded';
        newForm.style='height: fit-content; width: 50%;';
        newForm.innerHTML = "<div class='mt-5 mb-3'><label for='descriptionObjective' class='form-label'>Description de l'objectif</label><textarea rows=5 class='form-control' name='descriptionObjective' id='descriptionObjective' required></textarea><input type='number' class='form-control d-none' name='id' value='" + idSprint + "' required></div><button type='submit' class='btn w-100 login-button text-white'>Ajouter l'objectif</button>";
        containerFormObjective.appendChild(newForm);
        k = 1;
    }
}