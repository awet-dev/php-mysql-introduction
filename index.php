<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Model/Connection.php';
require 'Model/Student.php';
require 'Model/StudentLoader.php';

require 'Controller/InsertController.php';
require 'Controller/DisplayStudent.php';


if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $display = new DisplayStudent();
    $display->display();
} elseif (isset($_GET['user'])) {
    $profile = new DisplayStudent();
    $profile->displayProfile($_GET['user']);
} elseif (isset($_GET['page']) && $_GET['page'] === 'logIn') {
    $logIn = new InsertController();
    $logIn->logIn();
} elseif (isset($_POST['Edit'])) {
    $studentDelete = new InsertController();
    $studentDelete->deleteData($_POST['studentId']);
} else {
    $controller = new InsertController();
    $controller->render();
}



