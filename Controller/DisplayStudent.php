<?php


class DisplayStudent
{
    private array $studentsArray;

    public function display() {

        $studentLoader = new StudentLoader();
        $students = $studentLoader->getStudents();

        require 'View/display.php';
    }

}