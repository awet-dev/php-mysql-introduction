<?php


class DisplayStudent
{
    private array $studentsArray;

    public function display() {

        $studentLoader = new StudentLoader();
        $students = $studentLoader->getStudents();
        var_dump($students);
        require 'View/display.php';
    }

}