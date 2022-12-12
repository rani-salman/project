<?php
include 'config.php';
// we have 2 roles only either recepcionist or house keeping
if (isset($_POST['staffName'])) {
    $row = $staff_collection->findOne(['name' => $_POST['staffName']]);
    if ($row['role'] === 'house keeping') {
        $staff_collection->updateOne(
            ['name' => $_POST['staffName']],
            ['$set' => ['role' => "receptionist"]]
        );
    } else {
        $staff_collection->updateOne(
            ['name' => $_POST['staffName']],
            ['$set' => ['role' => "house keeping"]]
        );
    }
}
//delet staff
if (isset($_POST['staffNamefordelete'])) {
    $staff_collection->deleteOne(['name' => $_POST['staffNamefordelete']]);
    //delete tasks related to this staff
    $task_collection->deleteMany(['staffName' => $_POST['staffNamefordelete']]);
}
//delete tasks
if (isset($_POST["staffNamefordelete_Task"]) && isset($_POST["task_desc"])) {
    $task_collection->deleteOne(['$and' => [['staffUserName' => $_POST["staffNamefordelete_Task"]], ['description' => $_POST["task_desc"]]]]);
}
//edit rate
if (isset($_POST['staffNameforRate']) && isset($_POST['newrate'])) {
    $row = $staff_collection->findOne(['name' => $_POST['staffNameforRate']]);

    $staff_collection->updateOne(
        ['name' => $_POST['staffNameforRate']],
        ['$set' => ['rate' => $_POST['newrate']]]
    );
}
