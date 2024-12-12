var k = 0;

function addInputObjective() {
    if (k == 0) {
        console.log(idSprint);
        let containerFormObjective = document.getElementById("formObjective");
        let newForm = document.createElement("form");
        newForm.method = "get";
        newForm.id= 'formDiv' 
        newForm.action='../php/sprint_create.php';
        newForm.class='mt-4 p-3 w-50 lighter-grey-bg shadow-sm rounded';
        newForm.style='height: fit-content; width: 75%;';
        newForm.innerHTML = "<div class='mt-5 mb-3'><label for='deadline' class='form-label'>Deadline du sprint</label><input type='date' class='form-control' name='deadline' id='deadline' required><input type='number' class='form-control d-none' name='id' value='' required></div><button type='submit' class='btn w-100 login-button text-white'>Créer le sprint</button>";
        containerFormObjective.appendChild(newForm);
        k = 1;
    }
}