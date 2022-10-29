function AddStaffDisplay() {
  document.getElementById("home").style.opacity = 0.07;
  let add_staff_form = document.getElementById("addstaff-body");
  add_staff_form.classList.add("add-staff-style");
}
function AddTaskDisplay(e) {
  // console.log(i);
  // console.log(Staff_Array);
  console.log(e.target.parentElement.parentElement);
  document.getElementById("home").style.opacity = 0.07;
  let add_task_form = document.getElementById("add-task-form");
  let index = e.target.parentElement.parentElement.rowIndex;
  console.log(index);
  document.getElementById("task-title").innerHTML =
    "Assign Task to " + Staff_Array[index - 1].name;
  document.getElementById("submit-task").onclick = function () {
    AddTaskFunction(index - 1);
  };
  add_task_form.classList.add("add-task-style");
}
function AddTaskFunction(i) {
  let task_description = document.getElementById("newTask").value;
  let task_date = document.getElementById("task-date").value;
  if (task_description !== "" && task_date !== null) {
    Task_Array.push(new Task(Staff_Array[i], task_description, task_date));
    let newrow = document
      .querySelector("#task-table tbody")
      .insertRow(Task_Array.length - 1);
    // .getElementById("task-table")
    // .insertRow(Task_Array.length);
    let cell1 = newrow.insertCell(0);
    let cell2 = newrow.insertCell(1);
    let cell3 = newrow.insertCell(2);
    let cell4 = newrow.insertCell(3);
    cell1.innerHTML = Staff_Array[i].name;
    cell2.innerHTML = task_description;
    cell3.innerHTML = task_date;
    cell4.innerHTML = '<td><i class="fa-solid fa-trash"></i></td>';
    cancelTaskFunction();
    AddTaskFunctionalityDeleteButton();
  }
}
function submitFunction() {
  let name = document.getElementById("staff-name").value;
  let number = document.getElementById("staff-number").value;
  let address = document.getElementById("staff-address").value;
  let role = document.getElementById("role-form").value;
  if (name !== "" && (number !== "") & (address !== "") && role !== "") {
    let newStaff = new Staff(name, number, role, address);
    Staff_Array.push(newStaff);
    console.log(Staff_Array);
    // let newrow = document
    //   .getElementById("staff-table")
    //   .insertRow(Staff_Array.length);
    let newrow = document
      .querySelector("#staff-table tbody")
      .insertRow(Staff_Array.length - 1);
    let cell1 = newrow.insertCell(0);
    let cell2 = newrow.insertCell(1);
    let cell3 = newrow.insertCell(2);
    let cell4 = newrow.insertCell(3);
    let cell5 = newrow.insertCell(4);
    let cell6 = newrow.insertCell(5);
    console.log(role);
    cell1.innerText = name;
    cell2.innerText = number;
    cell3.innerHTML = `<select name="role" id="role">
    <option value="house_keeping">${role}</option>
    <option value="recepcionist">${
      role === "recepcionist" ? "house_keeping" : "recepcionist"
    }</option>

  </select>`;
    cell4.innerText = address;
    cell5.innerHTML = '<i class="fa-solid fa-trash"></i>';
    cell6.innerHTML =
      '<button type="button" class="new-task-button">New Task</button>';
    cancelFunction();
    addFunctionalityButtons();
  }
}
function cancelFunction() {
  document.getElementById("home").style.opacity = 1;
  let add_staff_form = document.getElementById("addstaff-body");

  add_staff_form.classList.remove("add-staff-style"); //back to display none
}
function cancelTaskFunction() {
  document.getElementById("home").style.opacity = 1;
  let add_task_form = document.getElementById("add-task-form");
  add_task_form.classList.remove("add-task-style"); //back to display none
}
function Staff(name, mobileNumber, role, address) {
  this.name = name;
  this.mobileNumber = mobileNumber;
  this.role = role;
  this.address = address;
  // this.task = task;
}
function Task(staff, description, dueDate) {
  this.staff = staff;
  this.description = description;
  this.dueDate = dueDate;
}
let Task_Array = [];

let Staff_Array = [
  new Staff("Leonardo", "71913710", "house_keeping", "baalbeck"),
  new Staff("Ali", "71913710", "house_keeping", "baalbeck"),
  new Staff("Rani", "71913710", "house_keeping", "baalbeck"),
  new Staff("mhamad", "71913710", "house_keeping", "baalbeck"),
  new Staff("Rana", "71913710", "house_keeping", "baalbeck"),
  new Staff("bilal", "71913710", "house_keeping", "baalbeck"),
];
for (let i = 0; i < Staff_Array.length; i++) {
  Task_Array.push(new Task(Staff_Array[i], "clean all rooms", "2022-12-2021"));
}
let staff_html_array = Staff_Array.map(
  (staff) =>
    `<tr><td>${staff.name}</td><td>${
      staff.mobileNumber
    }</td><td><select name="role" id="role">
    <option value="house_keeping">${staff.role}</option>
    <option value="recepcionist">${
      staff.role === "recepcionist" ? "house_keeping" : "recepcionist"
    }</option>

  </select></td><td>${
    staff.address
  }</td><td><i class="fa-solid fa-trash"></i></td><td><button type="button" class="new-task-button">New Task</button></td></tr>`
);
let task_html_array = Task_Array.map(
  (task) =>
    `<tr><td>${task.staff.name}</td><td>${task.description}</td><td>${task.dueDate}</td><td><i class="fa-solid fa-trash"></i></td></tr>`
);

document.querySelector("#staff-table tbody").innerHTML =
  staff_html_array.join("");
document.querySelector("#task-table tbody").innerHTML =
  task_html_array.join("");

function edit(index) {
  Staff_Array[index].role =
    document.querySelector("#staff-table tbody").childNodes[
      index
    ].childNodes[2].childNodes[0].value;

  console.log(Staff_Array);
}

function addFunctionalityButtons() {
  console.log(Staff_Array);
  var parent = document.querySelector("#staff-table tbody");
  console.log(parent);
  for (let i = 0, len = parent.children.length; i < len; i++) {
    console.log("in");
    //Role
    parent.childNodes[i].childNodes[2].addEventListener(
      "input",
      function () {
        edit(i);
      },
      false
    );
    parent.childNodes[i].childNodes[4].addEventListener(
      "click",

      deleteStaff,
      false
    );
    parent.childNodes[i].childNodes[5].addEventListener(
      "click",

      AddTaskDisplay
    );
  }
}
function AddTaskFunctionalityDeleteButton() {
  var parent = document.querySelector("#task-table tbody");
  for (let i = 0, len = parent.children.length; i < len; i++) {
    parent.childNodes[i].childNodes[3].addEventListener(
      "click",
      deleteTask,
      false
    );
  }
}
function deleteStaff(e) {
  console.log(e.target.parentElement.parentElement);
  let index = e.target.parentElement.parentElement.rowIndex;
  if (index) {
    Staff_Array.splice(index - 1, 1);
    document.getElementById("staff-table").deleteRow(index);
    console.log(Staff_Array);
  }
}
function deleteTask(e) {
  let index = e.target.parentElement.parentElement.rowIndex;
  console.log(index);
  if (index) {
    Task_Array.splice(index - 1, 1);
    document.getElementById("task-table").deleteRow(index);
    console.log(Task_Array);
  }
}

addFunctionalityButtons();
AddTaskFunctionalityDeleteButton();
