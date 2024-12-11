function displaySprint(link) {
    removeChilds(mainContainer);
    displaySprintInfo(mainContainer, link);
}

function displaySprintInfo(element, link) {
    mainContainer.classList.remove("d-flex");
    $.ajax({
        type: "POST",
        url: "../php/display_sprint_data.php",
        data: {id: link.id}
      })
        .done(function( response ) {
            element.innerHTML = response;
            i = 0;
            $("p.broken").html(response);
    });
    
}