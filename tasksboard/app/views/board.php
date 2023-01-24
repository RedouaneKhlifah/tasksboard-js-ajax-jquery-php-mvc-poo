<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task List 2021</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="/assets/css/styles.css" />
  </head>
    <body> 
      
    <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid">
                  <a class="navbar-brand" href="http://trelly/Tasksbroard/tasks">Trelly</a>
                  <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                      aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link" href="http://trelly/Tasksbroard/tasks">Tasks</a>
                          </li>
                          <form action="http://trelly/Tasksbroard/tasks" method="Post">
                          <li class="nav-item">
                              <a class="nav-link" ><input class="text" type="submit" name = 'logout' value = "<?php echo  $login ?>"></a>
                          </li>
                          </form>
                      </ul>
                  </div>
              </div>
          </nav>
    <header>
      <h1 class="title">Task List 2023</h1>
    </header>
    <input
          type="text"
          name="new-task-input"
          id="new-task-input"
          placeholder="Search"
        />
    <div class="container">

                <button type="button"
              class="addMultiple"
              id="new-task-submit"
              value="Add multipal"
              data-bs-toggle="modal" data-bs-target="#multiple">Add multipal</button>



            <!-- Modal multiple -->
            <center>

  <div class="modal fade text-dark" id="multiple" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">New task to do</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php BURL ?>/Tasksbroard/tasks" method="POST">
              <div>
                  <label>Tasks number</label>
                  <input type="number" class="num_task" name="num_task" value="1" min="1" max="3">
                </div>
                <div class="modal-body">



                <div class="form-group">
                  <label for="exampleInputEmail1">Task name</label>
                  <input type="text" name="task_text1" class="form-control" placeholder="task name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Dead line</label>
                  <input type="date" name="date1" class="form-control">
                </div>
                  <select name="tasktype1">
                  <option value="todo" default>TO DO</option>
                  <option value="doing">DOING</option>
                  <option value="done">DONE</option>
                  </select>

        </div>
        <div class="taskplus"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="addmulti" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </form>
  </div>
  </center>


<!-- tasks -->
            
      <div class="row">
      <!-- form action="<?php BURL ?>/rooms/add" method="POST" > -->
        <div class="col-lg-4 col-md-6 my-3 tasks todo" name = "todo"  id="tasks">
          <section class="task-list">
            <form method="POST" action="http://trelly/Tasksbroard/tasks">
          
            <h2 class="todo">To Do</h2>
            <button name="arrowdown"> <img  class="arrow"  src="/assets/img/arrowdown.png" alt=""> <input type="hidden" name="arrow_pos" value = 'todo'></button>

           
            <input
              type="button"
              class="addtask"
              id="new-task-submit"
              value="Add task"
            />

            <button  name='arrowUp'> <img  class="arrow" src="/assets/img/tdgchgcjcb.png" alt=""></button>
            </form>

            <p id="todo_num" ></p>
            
           

            <!-- <div class="task">
              <div class="content">
                <input type="text" class="text" value="A new task" readonly />
              </div>
              <div class="actions">
                <button class="edit">Edit</button>
                <button class="delete">Delete</button>
              </div>
            </div> -->
          </section>
        </div>
        <div class="col-lg-4 col-md-6 my-3 tasks doing" name = "doing" id="tasks">
          <section class="task-list">
         
            <h2>Doing</h2>
            <form method="POST" action="http://trelly/Tasksbroard/tasks">
              <button name="arrowdown"> <img  class="arrow"  src="/assets/img/arrowdown.png" alt=""> </button>
              <input type="hidden" name="arrow_pos" value = 'doing'>
              <p class="stats" id="doing_num"></p>
            <button name  = 'arrowUp'> <img  class="arrow" src="/assets/img/tdgchgcjcb.png" alt=""></button>
            </form>
           

            <!-- <div class="task">
                <div class="content">
                  <input 
                    type="text" 
                    class="text" 
                    value="A new task"
                    readonly>
                </div>
                <div class="actions">
                  <button class="edit">Edit</button>
                  <button class="delete">Delete</button>
                </div>
              </div> -->
          </section>
        </div>
        <div class="col-lg-4 col-md-6 my-3 tasks done" name = "done" id="tasks">
          <section class="task-list">
            <h2>Done</h2>
            <form method="POST" action="http://trelly/Tasksbroard/tasks">
            <button name="arrowdown"> <img name ='todo' class="arrow"  src="/assets/img/arrowdown.png" alt=""></button>
            <input type="hidden" name="arrow_pos" value = 'done'>
            <p class="stats" id="done_num"></p>
            <button name  = 'arrowUp'> <img  class="arrow" src="/assets/img/tdgchgcjcb.png" alt=""></button>
            </form>
            


              <!-- <input class="date" type="date"> -->

          </section>
        </div>
      </div>
    </div>


    

    <script src="/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <SCRIPT>

        // $.ajax({
        //   url:href,
        //   type:'GET',
        //   success: function(data){
        //       $('#content').html(data);
        //   }
        // });
      <?php foreach($datas as $data) {
           $text = str_replace(array("\n", "\r"), ' ', $data['task_text']);
        ?> 
     
      diSplay('<?php echo $text ?>','<?php echo $data['task_position'] ?> ', '<?php echo $data['id_task'] ?> ','<?php echo $data['height']?>px ','<?php echo $data['task_date']?>')
      <?php }?>
    </SCRIPT>
  </body>
</html>
