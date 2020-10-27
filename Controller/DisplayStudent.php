<?php


class DisplayStudent
{

    public function display() {

        $studentLoader = new StudentLoader();
        $students = $studentLoader->getStudents();

        require 'View/display.php';
    }

    public function displayProfile($id) {

        $studentLoader = new StudentLoader();
        $student = $studentLoader->displayStudent($id);
        require 'View/profile.php';
    }

}