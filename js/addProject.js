const addProjectButton = document.getElementById("addProjectButton");
const mainContainer = document.getElementById("mainContainer");

function setupListener() {
    addProjectButton.addEventListener("click", changeFormContainer);
}

function removeChilds(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

function createProjectForm(parent) {
    parent.innerHTML = "<form method='get' action='../php/project_create.php' class='mt-4 p-3 w-50 lighter-grey-bg shadow-sm rounded' style='height: fit-content;'><div class='mb-3'><label for='projectName' class='form-label'>Nom du projet</label><input type='text' class='form-control' name='projectName' id='projectName'required></div><div class='mb-3'></div><div class='mb-3'><label for='deadline' class='form-label'>Deadline</label><input type='date' class='form-control' name='deadline' id='deadline' required></div><div class='mb-3'><label for='budget' class='form-label'>Budget</label><input type='number' class='form-control' name='budget' id='budget' min='0' required></div><button type='submit' class='btn w-100 login-button text-white'>Créer le projet</button></form>"
}

function changeFormContainer() {
    removeChilds(mainContainer)
    createProjectForm(mainContainer)
    mainContainer.classList.add('d-flex');
}

window.addEventListener("load", setupListener);