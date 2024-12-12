var l = 0;

function addInputUserstory() {
    if (l == 0) {
        let containerFormUserstory = document.getElementById("formUserstory");
        let newForm = document.createElement("form");
        newForm.method = "get";
        newForm.id= 'formDiv' 
        newForm.action='../php/sprint_create_userstory.php';
        newForm.class='mt-4 p-3 w-50 lighter-grey-bg shadow-sm rounded';
        newForm.style='height: fit-content; width: 50%;';
        newForm.innerHTML = "<div class='mt-5 mb-3'><label for='descriptionUserstory' class='form-label'>Description de l'userstory</label><textarea rows=5 class='form-control' name='descriptionUserstory' id='descriptionUserstory' required></textarea><input type='number' class='form-control d-none' name='id' value='" + idSprint + "' required></div><button type='submit' class='btn w-100 login-button text-white'>Ajouter l'userstory</button>";
        containerFormUserstory.appendChild(newForm);
        l = 1;
    }
}