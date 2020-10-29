<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// require the model
require 'Model/Database.php';
require 'Model/Student.php';

// require the controllers
require 'Controller/ViewController.php';

if (isset($_GET['page']) && $_GET['page'] === 'login') { // to log in and see all the data there
    $insert = new ViewController();
    $insert->logIn();
} elseif (isset($_GET['user'])) { // to see one of the profiles
    $profile = new ViewController();
    $profile->profileData($_GET['user']);
} elseif (isset($_GET['id'])) { // to see one of the profiles
    $delete = new ViewController();
    $delete->deleteData($_GET['id']);
} else {
      $insert = new ViewController(); // the registration form
      $insert->insertData();
}


