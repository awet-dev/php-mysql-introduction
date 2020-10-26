<?php


class InsertController
{
    public function render() {
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])) {
            $loader = new StudentLoader();
            $student = new Student($loader->countStudent(), $_POST['first_name'], $_POST['last_name'], $_POST['email']);
            $student->save();
        }
        require 'View/insert.php';
    }

}