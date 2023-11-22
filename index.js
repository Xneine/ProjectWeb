
var signIn = document.getElementById("tes")
signIn.addEventListener("click", validation())
function validation(){
    var user = document.getElementById("Username").value;
    var pass = document.getElementById("Password").value;
    if ((user === null || user === "") && (pass === null || pass === "")){
        document.getElementById("confirm").innerHTML = "Pls Fill the username & Pass"
    }
    else if (user === null || user === ""){
        document.getElementById("confirm").innerHTML = "Pls Fill the username"
    }
    else if (pass === null || pass === ""){
        document.getElementById("confirm").innerHTML = "Pls Fill the pass"
    }
}