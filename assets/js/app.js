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

//Search Agents
function myRecord() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myData");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

//Search Reports
function reportFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("reportInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("reportData");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

//Table Pagination
$(document).ready( function () {
    $('#myData').DataTable();
} );