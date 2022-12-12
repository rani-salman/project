function toggleTextActive(event) {
  //
  let roomnb =
    event.target.parentElement.parentElement.parentElement.parentElement
      .parentElement.children[0].innerHTML;
  $.ajax({
    type: "POST",
    url: "dbmodificationStaff.php",
    data: { roomNb: roomnb },
    success: function () {
      var text = event.target.innerHTML;
      if (text == "active") {
        event.target.innerHTML = "free";
        event.target.style.color = "green";
      }
    },
  });
}
function addFunctionality() {
  var list = document.getElementsByClassName("buttonStaff");
  for (let i = 0; i < list.length; i++) {
    list[i].addEventListener("click", toggleTextActive);
  }

  var list2 = document.getElementsByClassName("buttonRoomService");
  for (let i = 0; i < list2.length; i++) {
    list2[i].addEventListener("click", toggleTextYes);
  }
}
function toggleTextYes(event) {
  let roomnb =
    event.target.parentElement.parentElement.parentElement.parentElement
      .parentElement.children[0].innerHTML;
  $.ajax({
    type: "POST",
    url: "dbmodificationStaff.php",
    data: { roomNum: roomnb },
    success: function () {
      var text = event.target.innerHTML;
      if (text == "Yes") {
        event.target.innerHTML = "No";
        event.target.style.color = "green";
      } else {
        event.target.innerHTML = "Yes";
        event.target.style.color = "red";
      }
    },
  });
}
// function toggleTextServed(event) {
//   var text = event.textContent || event.innerText;
//   if (text == "Served") {
//     event.innerHTML = "Not Served";
//     event.style.color = "red";
//   } else {
//     event.innerHTML = "Served";
//     event.style.color = "green";
//   }
// }

addFunctionality();
