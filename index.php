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

$controller = new InsertController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $display = new DisplayStudent();
    $display->display();
} else {
    $controller->render();
}
