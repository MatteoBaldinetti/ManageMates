function changeVisibilityPassword() {
    if (document.getElementById("checkbox").checked) {
        document.getElementById("password").type = "text";
   } else {
    document.getElementById("password").type = "password";
   }
}