//Greet Agent
var time = new Date().getHours();
if (time < 12) {
    greeting = "Good Morning";
} else if (time < 16) {
    greeting = "Good Afternoon";
} else {
    greeting = "Good Evening";
}
document.getElementById("greet").innerHTML = greeting;

//Password Reveal
function myFunction() {
    var pwd = document.getElementById("myPassword");
    var newPwd = document.getElementById("myPassword1");
    if (pwd.type === "password",
    newPwd.type === "password") {
        pwd.type = "text";
        newPwd.type = "text";
    } else {
        pwd.type = "password";
        newPwd.type = "password";
    }
}


//Print by Div
function printDiv(divName){
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}