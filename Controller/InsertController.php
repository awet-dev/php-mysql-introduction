<?php

class InsertController
{

    public function render() {
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && ($_POST['password'] === $_POST['confirm_password'])) {
            $loader = new StudentLoader();
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $student = new Student($loader->countStudent(), $_POST['first_name'], $_POST['last_name'], $_POST['email'], $hashed_password);
            $student->save();
            header("location: http://localhost/crud-mysql/index.php?user=($loader->countStudent() + 1);");
        }
        require 'View/insert.php';
    }

}