<?php
include 'config.php';
if (isset($_POST['taskAdded'])) {
    $name = $_POST['staffName'];
    $taskDescription = $_POST['description'];
    $dueDate = $_POST['date'];
    $task_collection->insertOne(['staffUserName' => $name, 'dueDate' => $dueDate, 'description' => $taskDescription]);
    // echo " task assigned successfully.Go back to admin web page through <a href='webadminPage.php'> Back</a>";
    // die();
    header('Location: webadminPage.php');
    //echo $taskDescription;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css" />
    <title>Document</title>
</head>

<body>
    <div class="add-task-form" id="add-task-form">
        <div class="form" id="form">
            <form action="addTask.php" method="post">
                <h1 id="task-title">Assign New Task to <?php echo $_GET['staffname'] ?></h1>
                <input type="hidden" name="staffName" value="<?php echo $_GET['staffname'] ?>">
                <div class="row">
                    <div class="title">Task</div>
                    <textarea class="fill" id="newTask" name="description" required></textarea>
                </div>
                <div class="row">
                    <div class="title">Due Date</div>
                    <input type="Date" class="fill" id="task-date" name="date" required />
                </div>

                <div class="row" id="lastrow">
                    <!-- <button id="submit-task">Add Task</button> -->
                    <input type="submit" value="Add Task" name="taskAdded" id="submit-task">
                    <!-- <button type="button" id="cancelTask" onclick="cancelTaskFunction()">
                        cancel
                    </button> -->
                    <a href="webadminPage.php">Back</a>

                </div>
            </form>
        </div>
    </div>

</body>

</html>