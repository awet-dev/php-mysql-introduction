<?php

declare(strict_types=1);
class ViewController
{
    public function insertData() {
        $page = 'insert';
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) &&  !empty($_POST['email']) &&  !empty($_POST['password']) &&  !empty($_POST['confirm_password'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && ($_POST['password'] === $_POST['confirm_password'])) {
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $student = new Student($_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashed_password);
                $data = new Database();
                $id = $data->createStudent($student);
                header("location: http://localhost/php-mysql-introduction/index.php?id=$id");
            }
        }
        require 'View/homePage.php';
    }

    public function displayData() {
        $data = new Database();
        $students = $data->getStudents();
        $page = 'display';;
        require 'View/homePage.php';
    }

    public function profileData($id) {
        $data = new Database();
        $student = $data->getStudent($id);
        $cat = $this->catPicture();
        $page = 'profile';
        require "View/homePage.php";
    }

    public function updateData($id) {
        $page = 'update';
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) &&  !empty($_POST['email']) &&  !empty($_POST['password']) &&  !empty($_POST['confirm_password'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && ($_POST['password'] === $_POST['confirm_password'])) {
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $data = new Database();
                $data->updateStudent($_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashed_password, $id);
                header("location: http://localhost/php-mysql-introduction/index.php?id=$id");
            }
        }
        require 'View/homePage.php';
    }

    public function deleteData($id) {
        $data = new Database();
        $data->deleteStudent($id);
        header("location: http://localhost/php-mysql-introduction/index.php");
    }

    public function login() {
        $page = 'login';
        $data = new Database();
        if (!empty($_POST['email']) && !empty($_POST['password'] && $data->logInStudent($_POST['email']))) {
            $student = $data->logInStudent($_POST['email']);
            if (password_verify($_POST['password'], $student->getPassword())) {
                header("location: http://localhost/php-mysql-introduction/index.php?page=display");
            }
        }
        require 'View/homePage.php';
    }

    public function catPicture() {
        $catUrl = 'https://api.thecatapi.com/v1/images/search';
        $cat = file_get_contents($catUrl);
        return json_decode($cat, true);
    }

}