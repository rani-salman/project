// function Staff(name, mobileNumber, role, address) {
//   this.name = name;
//   this.mobileNumber = mobileNumber;
//   this.role = role;
//   this.address = address;
// }
// function Task(staff, description, dueDate) {
//   this.staff = staff;
//   this.description = description;
//   this.dueDate = dueDate;
// }
// function Request(
//   Name,
//   numberOfPersons,
//   RoomType,
//   RoomNumber,
//   startDate,
//   enddate
// ) {
//   this.name = Name;
//   this.numberOfPersons = numberOfPersons;
//   this.RoomType = RoomType;
//   this.RoomNumber = RoomNumber;
//   this.startDate = startDate;
//   this.enddate = enddate;
// }
// let Request_array = [
//   new Request("Ali Youssef Solh", 2, "Suite", 202, "2022-01-30", "2023-01-30"),
//   new Request("Ali Youssef Solh", 2, "Suite", 202, "2022-01-30", "2023-01-30"),
//   new Request("Ali Youssef Solh", 2, "Suite", 202, "2022-01-30", "2023-01-30"),
//   new Request("Ali Youssef Solh", 2, "Suite", 202, "2022-01-30", "2023-01-30"),
//   new Request("Ali Youssef Solh", 2, "Suite", 202, "2022-01-30", "2023-01-30"),
//   new Request("Ali Youssef Solh", 2, "Suite", 202, "2022-01-30", "2023-01-30"),
// ];

// let Staff_Array = [
//   new Staff("Leonardo", "71913710", "house_keeping", "baalbeck"),
//   new Staff("Ali", "71913710", "house_keeping", "baalbeck"),
//   new Staff("Rani", "71913710", "house_keeping", "baalbeck"),
//   new Staff("mhamad", "71913710", "house_keeping", "baalbeck"),
//   new Staff("Rana", "71913710", "house_keeping", "baalbeck"),
//   new Staff("bilal", "71913710", "house_keeping", "baalbeck"),
// ];
// let Task_Array = [];
// for (let i = 0; i < Staff_Array.length; i++) {
//   Task_Array.push(new Task(Staff_Array[i], "clean all rooms", "2022-12-1"));
// }
// let request_html_array = Request_array.map(
//   (request) =>
//     `<tr>
// <td>${request.name}</td>
// <td>${request.numberOfPersons}</td>
// <td>${request.RoomType}</td>
// <td>${request.RoomNumber}</td>
// <td>${request.startDate}</td>
// <td>${request.enddate}</td>
// <td>
//   <button type="button" class="accept-button">Accept</button>
// </td>
// <td>
//   <button type="button" class="reject-button">reject</button>
// </td>
// </tr>`
// );

// let staff_html_array = Staff_Array.map(
//   (staff) =>
//     `<tr><td>${staff.name}</td><td>${
//       staff.mobileNumber
//     }</td><td><select name="role" id="role">
//     <option value="house_keeping">${staff.role}</option>
//     <option value="recepcionist">${
//       staff.role === "recepcionist" ? "house_keeping" : "recepcionist"
//     }</option>

//   </select></td><td>${
//     staff.address
//   }</td><td><i class="fa-solid fa-trash"></i></td><td><button type="button" class="new-task-button">New Task</button></td></tr>`
// );
// let task_html_array = Task_Array.map(
//   (task) =>
//     `<tr><td>${task.staff.name}</td><td>${task.description}</td><td>${task.dueDate}</td><td><i class="fa-solid fa-trash"></i></td></tr>`
// );
// document.querySelector("#requests-table tbody").innerHTML =
//   request_html_array.join("");
// document.querySelector("#staff-table tbody").innerHTML =
//   staff_html_array.join("");
// document.querySelector("#task-table tbody").innerHTML =
//   task_html_array.join("");

// function AddStaffDisplay() {
//   document.getElementById("home").style.opacity = 0.07;
//   let add_staff_form = document.getElementById("addstaff-body");
//   add_staff_form.classList.add("add-staff-style");
// }
// function AddTaskDisplay(e) {
//   // console.log(i);
//   // console.log(Staff_Array);
//   let name=e.target.parentElement.parentElement.children[0].innerHTML;
//   // document.getElementById("task-title").innerHTML =
//   //   "Assign Task to " + Staff_Array[index - 1].name;
//   // document.getElementById("submit-task").onclick = function () {
//   //   AddTaskFunction(index - 1);
//   // };
// }
// function AddTaskFunction(i) {
//   let task_description = document.getElementById("newTask").value;
//   let task_date = document.getElementById("task-date").value;
//   if (task_description !== "" && task_date !== null) {
//     // Task_Array.push(new Task(Staff_Array[i], task_description, task_date));
//     let newrow = document
//       .querySelector("#task-table tbody")
//       .insertRow(Task_Array.length - 1);
//     // .getElementById("task-table")
//     // .insertRow(Task_Array.length);
//     let cell1 = newrow.insertCell(0);
//     let cell2 = newrow.insertCell(1);
//     let cell3 = newrow.insertCell(2);
//     let cell4 = newrow.insertCell(3);
//     cell1.innerHTML = Staff_Array[i].name;
//     cell2.innerHTML = task_description;
//     cell3.innerHTML = task_date;
//     cell4.innerHTML = '<td><i class="fa-solid fa-trash"></i></td>';
//     cancelTaskFunction();
//     AddTaskFunctionalityDeleteButton();
//   }
// }
// function submitFunction() {
//   let name = document.getElementById("staff-name").value;
//   let number = document.getElementById("staff-number").value;
//   let address = document.getElementById("staff-address").value;
//   let role = document.getElementById("role-form").value;
//   if (name !== "" && (number !== "") & (address !== "") && role !== "") {
//     let newStaff = new Staff(name, number, role, address);
//     Staff_Array.push(newStaff);
//     // console.log(Staff_Array);
//     let newrow = document
//       .querySelector("#staff-table tbody")
//       .insertRow(Staff_Array.length - 1);
//     let cell1 = newrow.insertCell(0);
//     let cell2 = newrow.insertCell(1);
//     let cell3 = newrow.insertCell(2);
//     let cell4 = newrow.insertCell(3);
//     let cell5 = newrow.insertCell(4);
//     let cell6 = newrow.insertCell(5);
//     console.log(role);
//     cell1.innerText = name;
//     cell2.innerText = number;
//     cell3.innerHTML = `<select name="role" id="role">
//     <option value="house_keeping">${role}</option>
//     <option value="recepcionist">${
//       role === "recepcionist" ? "house_keeping" : "recepcionist"
//     }</option>

//   </select>`;
//     cell4.innerText = address;
//     cell5.innerHTML = '<i class="fa-solid fa-trash"></i>';
//     cell6.innerHTML =
//       '<button type="button" class="new-task-button">New Task</button>';
//     cancelFunction();
//     addFunctionalityButtons();
//   }
// }
// function cancelFunction() {
//   document.getElementById("home").style.opacity = 1;
//   let add_staff_form = document.getElementById("addstaff-body");

//   add_staff_form.classList.remove("add-staff-style"); //back to display none
// }
// function cancelTaskFunction() {
//   document.getElementById("home").style.opacity = 1;
//   let add_task_form = document.getElementById("add-task-form");
//   add_task_form.classList.remove("add-task-style"); //back to display none
// }

function edit(e) {
  let index = e.target.parentElement.parentElement.rowIndex;
  let row_name =
    document.querySelector("#staff-table tbody").children[index - 1]
      .children[0];
  let row_role =
    document.querySelector("#staff-table tbody").children[index - 1]
      .children[3];
  //update on backend
  $.ajax({
    type: "POST",
    url: "dbmodification.php",
    data: { staffName: row_name.innerHTML },
    success: function () {
      row_role.innerHTML =
        row_role.innerHTML === "house keeping"
          ? "recepcionist"
          : "house keeping";
    },
  });
}
function pendingRequestFunctionality() {
  var parent3 = document.querySelector("#requests-pending-rooms tbody");

  // console.log(parent);
  // console.log(parent.children);
  for (let i = 0, len = parent3.children.length; i < len; i++) {
    console.log("in");
    //Role
    parent3.children[i].children[4].addEventListener(
      "click",

      acceptRoom
    );
    parent3.children[i].children[5].addEventListener(
      "click",

      rejectRoom
    );
  }
}
function addFunctionalityButtons() {
  // console.log(Staff_Array);
  var parent = document.querySelector("#staff-table tbody");
  console.log(parent);
  console.log(parent.children);
  for (let i = 0, len = parent.children.length; i < len; i++) {
    console.log("in");
    //Role
    parent.children[i].childNodes[6].addEventListener(
      "click",

      edit
    );
    parent.children[i].childNodes[5].addEventListener(
      "click",

      deleteStaff,
      false
    );
  }
  let prnt = document.querySelector("#rating-table tbody");
  for (let i = 0, len = prnt.children.length; i < len; i++) {
    //console.log("in m");
    //Role
    prnt.children[i].childNodes[2].addEventListener(
      "input",

      editRate
    );
  }
}
function editRate(e) {
  // console.log(e.target.value);
  let index = e.target.parentElement.parentElement.rowIndex;
  let row_name = document.querySelector("#rating-table tbody").children[
    index - 1
  ].children[0];
  $.ajax({
    type: "POST",
    url: "dbmodification.php",
    data: { staffNameforRate: row_name.innerHTML, newrate: e.target.value },
  });
}
function acceptRoom(e) {
  console.log("in");
  let index = e.target.parentElement.parentElement.rowIndex;
  let row_name = document.querySelector("#requests-pending-rooms tbody")
    .children[index - 1].children[0];
  let row_number = document.querySelector("#requests-pending-rooms tbody")
    .children[index - 1].children[1];
  console.log(row_name.innerHTML);
  console.log(row_number.innerHTML);
  $.ajax({
    type: "POST",
    url: "pending-requests-rooms.php",
    data: {
      customerName_accept: row_name.innerHTML,
      roomNumber_accept: row_number.innerHTML,
    },
    success: function (data) {
      document.getElementById("requests-pending-rooms").deleteRow(index);
      // // $("#table-container").html(data);
      const response = JSON.parse(data);

      let array = response.map(
        (booking) =>
          `<tr><td>${booking.customerName}</td><td>${booking.number}</td><td>${booking.startDate}</td><td>${booking.endDate}</td></tr>`
      );
      console.log(document.querySelector("#accepted-rooms-bookings").innerHTML);
      document.querySelector("#accepted-rooms-bookings tbody").innerHTML =
        array.join("");
    },
  });
  $.ajax({
    type: "POST",
    url: "allRoomsStatus.php",
    success: function (data2) {
      // // $("#table-container").html(data);
      const response2 = JSON.parse(data2);

      let array2 = response2.map((room) => {
        if (room.status === "free") {
          return `<tr><td>${room.number}</td><td>${room.type}</td><td class="deactive-room">Free</td></tr>`;
        }
        return `<tr><td>${room.number}</td><td>${room.type}</td><td class="active-room">Active</td></tr>`;
      });
      console.log(array2.join(""));
      document.querySelector("#room-status-table tbody").innerHTML =
        array2.join("");
    },
  });
}
function rejectRoom(e) {
  console.log("in noew");
  let index = e.target.parentElement.parentElement.rowIndex;
  let row_name = document.querySelector("#requests-pending-rooms tbody")
    .children[index - 1].children[0];
  let row_number = document.querySelector("#requests-pending-rooms tbody")
    .children[index - 1].children[1];
  console.log(row_name.innerHTML);
  console.log(row_number.innerHTML);
  $.ajax({
    type: "POST",
    url: "pending-requests-rooms.php",
    data: {
      customerName_reject: row_name.innerHTML,
      roomNumber_reject: row_number.innerHTML,
    },
    success: function () {
      document.getElementById("requests-pending-rooms").deleteRow(index);
      // // // $("#table-container").html(data);
      // const response = JSON.parse(data);
    },
  });
}
function AddTaskFunctionalityDeleteButton() {
  var parent = document.querySelector("#task-table tbody");
  for (let i = 0, len = parent.children.length; i < len; i++) {
    parent.children[i].childNodes[3].addEventListener(
      "click",
      deleteTask,
      false
    );
  }
}
function deleteStaff(e) {
  // console.log(e.target.parentElement.parentElement);
  let index = e.target.parentElement.parentElement.rowIndex;
  if (index) {
    //let deleted_Staff = Staff_Array[index - 1];
    //Staff_Array.splice(index - 1, 1);
    let stf_name = e.target.parentElement.parentElement.children[0].innerHTML;
    // console.log(e.target.parentElement.parentElement);
    console.log(stf_name);
    $.ajax({
      type: "POST",
      url: "dbmodification.php",
      data: { staffNamefordelete: stf_name },
      success: function () {
        document.getElementById("staff-table").deleteRow(index);
        let task_table = document.querySelector("#task-table tbody");
        for (let i = 0; i < task_table.children.length; i++) {
          if (task_table.children[i].children[0].innerHTML === stf_name) {
            document.getElementById("task-table").deleteRow(i - 1);
          }
        }
      },
    });
    // console.log(Staff_Array);
    //remove all tasks assigned to this staff
    // for (let i = 0; i < Task_Array.length; i++) {
    //   if (Task_Array[i].staff.name === deleted_Staff.name) {
    //     //  indices.push(i);
    //     Task_Array.splice(i, 1);
    //     document.getElementById("task-table").deleteRow(i + 1);
    //     i--;
    //   }
    // }
  }
}
function deleteTask(e) {
  let index = e.target.parentElement.parentElement.rowIndex;
  if (index) {
    let stf_name = e.target.parentElement.parentElement.children[0].innerHTML;
    let task = e.target.parentElement.parentElement.children[1].innerHTML;
    console.log(stf_name);
    console.log(task);
    $.ajax({
      type: "POST",
      url: "dbmodification.php",
      data: { staffNamefordelete_Task: stf_name, task_desc: task },
      success: function () {
        document.getElementById("task-table").deleteRow(index);
      },
    });
  }
}

addFunctionalityButtons();
AddTaskFunctionalityDeleteButton();
pendingRequestFunctionality();
