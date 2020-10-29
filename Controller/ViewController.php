<?php

declare(strict_types=1);
class ViewController
{
    public function insertData() {
        require 'View/register.php';
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) &&  !empty($_POST['email']) &&  !empty($_POST['password']) &&  !empty($_POST['confirm_password'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && ($_POST['password'] === $_POST['confirm_password'])) {
                $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $data = new Database();
                $id = $data->countStudents();
                $lastStudent = $data->getStudents()[$id-1];
                $student = new Student(($lastStudent->getId() +1), $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashed_password);
                $data->saveStudent($student);
                header("location: http://localhost/crud-mysql/index.php?user=".$student->getId());
            }
        }
    }

    public function deleteData($id) {
        $data = new Database();
        $data->deleteStudent($id);
        header("location: http://localhost/crud-mysql/index.php");
    }

    public function updateData($student, $id) {
        $data = new Database();
        $data->updateStudent($student, $id);
        header("location: http://localhost/crud-mysql/index.php?user=".$id);
    }

    public function login() {
        require 'View/login.php';
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $data = new Database();
            $students = $data->getStudents();
            foreach ($students as $student) {
                if ($_POST['email'] === $student->getEmail() && password_verify($_POST['password'], $student->getPassword())) {
                    $this->displayData();
                    break;
                }
            }
        }
    }

    public function displayData() {
        $data = new Database();
        $students = $data->getStudents();
        require 'View/display.php';
    }

    public function profileData($id) {
        $data = new Database();
        $student = $data->getStudents()[$id];

        $catUrl = 'https://api.thecatapi.com/v1/images/search';
        $cat = file_get_contents($catUrl);
        $cat = json_decode($cat, true);
        require 'View/profile.php';
    }


}