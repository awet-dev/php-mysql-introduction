<?php

class InsertController
{
    public function render() {
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && ($_POST['password'] === $_POST['confirm_password'])) {
            $loader = new StudentLoader();
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $student = new Student($loader->countStudent(), $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashed_password);
            $student->save();
            header("location: http://localhost/crud-mysql/index.php?user=".($student->getId() + 1));
        }
        require 'View/insert.php';
    }

    public function logIn() {


        if (!empty($_POST['email'])) {
            $loader = new StudentLoader();
            $students = $loader->getStudents();
            $counter = 0;
            $error = "";
            foreach ($students as $student) {
                $counter++;
                if ($_POST['email'] == $student->getEmail() && password_verify($_POST['password'], $student->getPassword() )) {
                    header("location: http://localhost/crud-mysql/index.php?page=info");
                    break;
                } elseif ($loader->countStudent() == $counter) {
                    $error = "style='border: red solid 2px'";
                }
            }
        }
        require 'View/logIn.php';
    }


    public function deleteData($id) {
        if (isset($_POST['Edit'])) {
            $loader = new StudentLoader();
            $user = $loader->displayStudent($id);
            $student = new Student((int)$user['id'], (string)$user['first_name'], (string)$user['last_name'], (string)$user['email'], (string)$user['password']);
            $connection = new Connection();
            $student->delete($connection->openConnection());
        }
    }



}