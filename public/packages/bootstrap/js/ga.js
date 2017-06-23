function check_empty() {
        if (document.getElementById('title').value == "" || document.getElementById('slug').value == ""  || document.getElementById('description').value == "") {
            alert("Fill All Fields !");
        } else if(document.getElementById('description').value.length < 8 ){
            alert("Description should be greater at least 8 characters !");
        }

        else{
            document.getElementById('forms').submit();
            alert("Form Submitted Successfully...");
        }

}
//Function To Display Popup
function div_show() {

    document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
    document.getElementById('abc').style.display = "none";
}