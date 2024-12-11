function displayProject(link) {
    removeChilds(mainContainer);
    displayProjectInfo(mainContainer, link)
}

function displayProjectInfo(element, link) {
    $.ajax({
        type: "POST",
        url: "../php/display_project_data.php",
        data: {id: link.id}
      })
        .done(function( response ) {
            element.innerHTML = response
            $("p.broken").html(response);
    });
    
}