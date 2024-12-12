// Function : Task Drop Function
const drop = (event) => {
    event.preventDefault();
    let taskID = event.dataTransfer.getData("text");
    
    // Prevent Drop Event to trigger of a Task on another Task
    if (event.target.id.includes("task")) return;

    event.target.appendChild(document.getElementById(taskID));
}

// Function : Allow Task to Drop Function
const allowdrop = (event) => {
    event.preventDefault();
}

// Function : Task Drag Function
const drag = (event) => {
    event.dataTransfer.setData("text", event.target.id);
}