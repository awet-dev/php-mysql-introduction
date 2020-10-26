<?php


class InsertController
{
    public function render() {
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email'])) {
            $student = new Student($_POST['first_name'], $_POST['last_name'], $_POST['email']);
            $student->save();
        }

        require 'View/insert.php';
    }

}