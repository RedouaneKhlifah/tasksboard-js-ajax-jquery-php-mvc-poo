"use strict";
const addTaskBUtton = document.querySelector("#new-task-submit");

const taskContainer = document.querySelectorAll("#tasks");

const formContainer = document.querySelectorAll(".form");
const todo = document.querySelector(".todo");
const doing = document.querySelector(".doing");
const done = document.querySelector(".done");
const addtask = document.querySelector(".addtask");

let todo_num = document.querySelector("#todo_num");
let doing_num = document.querySelector("#doing_num");
let done_num = document.querySelector("#done_num");

function gettodaydate() {
  let currentDate = new Date().toJSON().slice(0, 10);
  // console.log(currentDate);

  // let today = `${year}-${month}-${day}`;
  return currentDate;
}

function expandTextarea(id) {
  document.getElementById(id).addEventListener(
    "keyup",
    function () {
      this.style.overflow = "hidden";
      this.style.height = 0;
      this.style.height = this.scrollHeight + "px";
    },
    false
  );
}

addtask.addEventListener("click", () => {
  const form = document.createElement("form");
  form.classList.add("form");
  form.setAttribute("method", "post");
  form.setAttribute("action", `http://trelly/Tasksbroard/tasks`);

  const date = document.createElement("input");
  date.classList.add("date");
  date.type = "date";
  date.name = "date";
  date.value = gettodaydate();
  form.appendChild(date);

  const divTask = document.createElement("div");
  divTask.classList.add("task");
  divTask.draggable = "true";
  form.appendChild(divTask);

  const divContent = document.createElement("div");
  divContent.classList.add("content");
  divTask.appendChild(divContent);

  const hideninput = document.createElement("input");
  hideninput.value = "todo";
  hideninput.name = "hideninput";
  hideninput.type = "hidden";

  const heightthidden = document.createElement("input");
  heightthidden.name = "height";
  heightthidden.value = "39";
  heightthidden.type = "hidden";

  divTask.appendChild(hideninput);
  divTask.appendChild(heightthidden);

  const inputText = document.createElement("textarea");
  inputText.classList.add("textbox");
  inputText.name = "task_text";
  inputText.spellcheck = "false";

  // inputText.setAttribute("id", "textbox");

  inputText.style.height = "false";
  inputText.innerText = "";

  divContent.appendChild(inputText);
  // document.getElementById("textbox").focus();

  const divActions = document.createElement("div");
  divActions.classList.add("actions");

  const buttonEdit = document.createElement("button");
  buttonEdit.classList.add("edit");
  buttonEdit.name = "save";
  buttonEdit.innerText = "save";
  divActions.appendChild(buttonEdit);

  const buttonDelete = document.createElement("button");
  buttonDelete.classList.add("delete");
  buttonDelete.innerText = "dELETE";
  divActions.appendChild(buttonDelete);

  divTask.appendChild(divActions);

  todo.appendChild(form);

  inputText.focus();

  const formContainer = document.querySelectorAll(".form");
  formContainer.forEach((element) => {
    element.addEventListener("dragstart", () => {
      element.classList.add("dragging");
      let old = element.parentElement.getAttribute("name");
      element.setAttribute("name", `${old}`);
    });
    element.addEventListener("dragend", () => {
      element.classList.remove("dragging");
      old = element.parentElement.getAttribute("name");
      element.setAttribute("name", `${old}`);
    });
  });

  buttonEdit.addEventListener("click", (e) => {
    if (buttonEdit.innerText == "EDIT") {
      e.preventDefault();
      buttonEdit.innerText = "SAVE";
      inputText.removeAttribute("readonly");
      inputText.focus();
      inputText.style.cursor = "text";
      divTask.style.cursor = "default";

      // const textbox = document.querySelector(".textbox");
      // textbox.addEventListener("keyup", (e) => {
      //   let shight = e.target.scrollHeight;
      //   textbox.style.height = "auto";
      //   console.log(shight);
      //   textbox.style.height = `${shight}px`;
      // });
    } else {
      buttonEdit.innerText = "EDIT";
      let height;
      if (inputText.style.height === "") {
        height = "39";
      } else {
        height = inputText.style.height.replace("px", "");
      }
      heightthidden.value = `${height}`;

      // console.log(heightthidden.value);
      inputText.setAttribute("readonly", "readonly");
      inputText.style.cursor = "inherit";

      divTask.style.cursor = "move";
      inputText.innerText = inputText.value;
    }
  });

  // buttonDelete.addEventListener("click", () => {
  //   let parent = buttonDelete.parentElement.parentElement.parentElement;
  //   let child = buttonDelete.parentElement.parentElement;

  //   parent.removeChild(child);
  // });

  // inputText.addEventListener("focusout", () => {
  //   buttonEdit.innerText = "EDIT";
  //   inputText.setAttribute("readonly", "readonly");
  //   inputText.style.cursor = "inherit";
  //   divTask.style.cursor = "move";
  //   inputText.innerText = inputText.value;
  // });
  // console.log(inputText);
  inputText.addEventListener("keyup", (e) => {
    let shight = e.target.scrollHeight;
    // console.log(shight);
    // console.log(scrollHeight);
    inputText.style.height = `${shight}px`;
  });
});

taskContainer.forEach((element) => {
  const draggable = document.querySelector(".dragging");
  element.addEventListener("dragover", (e) => {
    e.preventDefault();
    const draggable = document.querySelector(".dragging");
    element.appendChild(draggable);
  });
});

taskContainer.forEach((element) => {
  const draggable = document.querySelector(".draggingPhone");
  element.addEventListener("touchmove", (e) => {
    e.preventDefault();
    const draggable = document.querySelector(".draggingPhone");
    element.appendChild(draggable);
  });
});

// const textbox = document.querySelector(".textbox");
// textbox.addEventListener("keyup", (e) => {
//   let shight = e.target.scrollHeight;
//   textbox.style.height = "auto";
//   console.log(shight);
//   textbox.style.height = `${shight}px`;
// });

// display tasks ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const diSplay = function (taskText, position, id, height, dates) {
  const form = document.createElement("form");
  form.classList.add("form");
  form.setAttribute("id", `${id}`);
  form.setAttribute("method", "post");
  form.setAttribute("action", `http://trelly/Tasksbroard/tasks`);

  const date = document.createElement("input");
  date.classList.add("date");
  date.type = "date";
  date.name = "date";
  date.style.cursor = "move";
  date.value = dates;
  date.setAttribute("readonly", "readonly");
  form.appendChild(date);

  const divTask = document.createElement("div");

  divTask.classList.add("task");
  divTask.draggable = "true";
  form.appendChild(divTask);
  divTask.style.cursor = "move";

  const divContent = document.createElement("div");
  divContent.classList.add("content");
  divTask.appendChild(divContent);

  const idhidden = document.createElement("input");
  idhidden.name = "id";
  idhidden.value = `${id}`;
  idhidden.type = "hidden";

  const heightthidden = document.createElement("input");
  heightthidden.name = "height";
  heightthidden.value = `${height}`;
  heightthidden.type = "hidden";

  // const poshidden = document.createElement("input");
  // idhidden.name = "pos_hidden";
  // idhidden.value = `${id}`;
  // idhidden.type = "hidden";

  divTask.append(idhidden);
  divTask.append(heightthidden);

  const inputText = document.createElement("textarea");
  inputText.classList.add("textbox");
  inputText.name = "task_text";
  inputText.style.height = `${height}`;
  console.log(height);
  inputText.spellcheck = "false";

  // inputText.setAttribute("id", "textbox");

  inputText.style.height = "false";
  inputText.setAttribute("readonly", "readonly");
  inputText.style.cursor = "inherit";

  inputText.innerText = `${taskText}`;

  divContent.appendChild(inputText);
  // document.getElementById("textbox").focus();

  const divActions = document.createElement("div");
  divActions.classList.add("actions");

  const buttonEdit = document.createElement("button");
  buttonEdit.classList.add("edit");
  buttonEdit.innerText = "EDIT";

  divActions.appendChild(buttonEdit);

  const buttonDelete = document.createElement("button");
  buttonDelete.classList.add("delete");
  buttonDelete.name = "delete";

  buttonDelete.innerText = "dELETE";
  divActions.appendChild(buttonDelete);

  divTask.appendChild(divActions);
  let pos = `${position}`;
  document.querySelector(`.${pos}`).appendChild(form);

  inputText.focus();

  const formContainer = document.querySelectorAll(".form");
  formContainer.forEach((element) => {
    let old;
    element.addEventListener("dragstart", () => {
      element.classList.add("dragging");
      old = element.parentElement.getAttribute("name");
      // let positionTask = element.parentElement.getAttribute("name");
      element.setAttribute("name", `${old}`);
    });
    element.addEventListener("dragend", () => {
      element.classList.remove("dragging");

      let positionTask = element.parentElement.getAttribute("name");
      element.setAttribute("name", `${positionTask}`);
      let id = element.getAttribute("id");
      // console.log(id);
      // console.log(positionTask);
      // console.log(old);
      if (`${old}` !== positionTask) {
        todo_num.innerHTML = $(".todo").children(".form").length;
        doing_num.innerHTML = $(".doing").children(".form").length;
        done_num.innerHTML = $(".doing").children(".form").length;
        $.ajax({
          url: "http://trelly/Tasksbroard/tasks",
          method: "POST",
          data: {
            idd: id,
            position: positionTask,
          },
          // success: function (response) {

          // },
        });

        // const xhr = new XMLHttpRequest();

        // xhr.open(
        //   "post",
        //   "../../../app/Controllers/TasksbroardController.php",
        //   true
        // );

        // // xhr.onload = () => {
        // //   if (xhr.status === 200) {
        // //     console.log(xhr.response.text);
        // //   } else {
        // //     console.log("some problem");
        // //   }
        // // };
        // const task = {
        //   id: id,
        //   position: positionTask,
        // };

        // const jasondata = JSON.stringify(task);
        // xhr.send(jasondata);
        // console.log(task);
      }
    });
  });

  // formContainer.forEach((element) => {
  //   let old;
  //   element.addEventListener("touchmove", () => {
  //     element.classList.add("draggingPhone");
  //     old = element.parentElement.getAttribute("name");
  //     console.log();
  //     // let positionTask = element.parentElement.getAttribute("name");
  //     element.setAttribute("name", `${old}`);
  //   });
  //   element.addEventListener("touchend", () => {
  //     element.classList.remove("draggingPhone");

  //     let positionTask = element.parentElement.getAttribute("name");
  //     element.setAttribute("name", `${positionTask}`);
  //     let id = element.getAttribute("id");
  //     // console.log(id);
  //     // console.log(positionTask);
  //     // console.log(old);
  //     if (`${old}` !== positionTask) {
  //       // console.log("change");
  //       $.ajax({
  //         url: "http://trelly/Tasksbroard/tasks",
  //         method: "POST",
  //         data: {
  //           idd: id,
  //           position: positionTask,
  //         },
  //         // success: function (response) {

  //         // },
  //       });

  //       // const xhr = new XMLHttpRequest();

  //       // xhr.open(
  //       //   "post",
  //       //   "../../../app/Controllers/TasksbroardController.php",
  //       //   true
  //       // );

  //       // // xhr.onload = () => {
  //       // //   if (xhr.status === 200) {
  //       // //     console.log(xhr.response.text);
  //       // //   } else {
  //       // //     console.log("some problem");
  //       // //   }
  //       // // };
  //       // const task = {
  //       //   id: id,
  //       //   position: positionTask,
  //       // };

  //       // const jasondata = JSON.stringify(task);
  //       // xhr.send(jasondata);
  //       // console.log(task);
  //     }
  //   });
  // });

  buttonEdit.addEventListener("click", (e) => {
    if (buttonEdit.innerText == "EDIT") {
      e.preventDefault();
      let end = inputText.value.length;
      buttonEdit.innerText = "SAVE";
      buttonEdit.name = "save";
      // formContainer.style.cursor = "pointer";
      inputText.style.cursor = "text";
      date.style.cursor = "text";
      date.removeAttribute("readonly");
      divTask.style.cursor = "default";
      divTask.setAttribute("draggable", "false");

      inputText.removeAttribute("readonly");
      inputText.style.cursor = "text";
      inputText.setSelectionRange(end);
      inputText.focus();
    } else {
      let height;
      if (inputText.style.height === "") {
        height = `${height}`;
      } else {
        height = inputText.style.height.replace("px", "");
      }
      heightthidden.value = `${height}`;

      // console.log(inputText.style.height);
      buttonEdit.innerText = "EDIT";
      inputText.setAttribute("readonly", "readonly");
      inputText.style.cursor = "inherit";
      date.style.cursor = "move";
      date.setAttribute("readonly", "readonly");
      inputText.innerText = inputText.value;
      divTask.style.cursor = "move";
      divTask.setAttribute("draggable", "true");
    }
  });

  // buttonDelete.addEventListener("click", () => {
  //   let parent = buttonDelete.parentElement.parentElement.parentElement;
  //   let child = buttonDelete.parentElement.parentElement;

  //   parent.removeChild(child);
  // });
  // console.log(textbox);
  inputText.addEventListener("keyup", (e) => {
    let shight = e.target.scrollHeight;
    inputText.style.height = `${shight}px`;
  });

  const seachinput = document.querySelector("#new-task-input");
  // ******************Search logic************************
  let Names = document.querySelectorAll(".textbox");

  seachinput.addEventListener("input", (e) => {
    let filter = e.target.value;
    filter = filter.toUpperCase();
    for (let i = 0; i < Names.length; i++) {
      let a = Names[i].innerHTML;
      a = a.toUpperCase();
      if (a.indexOf(filter) > -1) {
        Names[i].parentElement.parentElement.parentElement.style.display =
          "block";
      } else {
        Names[i].parentElement.parentElement.parentElement.style.display =
          "none";
      }
    }
  });

  // console.log(numItems);
  // console.log(numIte);
  todo_num.innerHTML = $(".todo").children(".form").length;
  console.log($(".todo").children(".form").length);
  doing_num.innerHTML = $(".doing").children(".form").length;
  console.log($(".doing").children(".form").length);
  done_num.innerHTML = $(".doing").children(".form").length;
  console.log($(".doing").children(".form").length);
  // console.log(form);
};

let input = document.querySelector(".num_task");
let continv = document.querySelector(".taskplus");
input.addEventListener("input", () => {
  continv.innerHTML = "";
  let number = input.value;
  if (number > 0) {
    let i = 2;
    while (i <= number) {
      continv.innerHTML += `

            <form action="<?php BURL ?>/task/add" method="POST">

                <div class="form-group">
                  <label for="exampleInputEmail1">Task name</label>
                  <input type="text" name="task_text${i}" class="form-control" placeholder="task name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Dead line</label>
                  <input type="date" name="date${i}" class="form-control">
                </div>
                  <select name="tasktype${i}">
                  <option value="todo" default>TO DO</option>
                  <option value="doing">DOING</option>
                  <option value="done">DONE</option>
                  </select>
            </form>`;
      i++;
    }
  }
});

// search ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
