
// function Update() {
//     var fromDate = document.getElementsByClassName("startdate").value.split(/\//).reverse().join('/');
//     var toDate = document.getElementsByClassName("enddate").value.split(/\//).reverse().join('/');

//     if ((fromDate != "" && toDate != "") && (Date.parse(fromDate) > Date.parse(toDate))) {
//         swal("End date should be greater than Start date", "", "error");
//         return false;
//     } else {
//         swal("Your record has been Updated.", "", "success");
//         return true;
//     }
// }
$("#StartDate, #EndDate").datepicker();

$("#EndDate").change(function () {
    var startDate = document.getElementById("startdate").value;
    var endDate = document.getElementById("enddate").value;

    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("EndDate").value = "";
    }
});
  document.getElementsByClassName("button1").addEventListener("click", change, false);







