
document.getElementById("tes").onclick = validation(); 
function validation(){
    var user = document.getElementById("Username").value;
    var pass = document.getElementById("Password").value;
    if ((user == null || user == "")){
        document.getElementById("confirm").innerHTML = "Pls Fill the username"
    }
    else if (pass == null || pass == ""){
        document.getElementById("confirm").innerHTML = "Pls Fill the pass"
    }
    else {
        document.getElementById("confirm").innerHTML = "Pls Fill the pass  & Usern"
    }
}