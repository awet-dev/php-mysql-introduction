<?php


class StudentLoader extends Connection
{
    private array $students;

    public function __construct()
    {
        if (empty($this->student)) {
            $pdo = $this->openConnection();
            $statement = $pdo->prepare('SELECT * FROM student');
            $statement->execute();
            $students = $statement->fetchAll();
            foreach ($students as $student) {
                $this->students[$student['id']] = new Student((int)$student['id'], (string)$student['first_name'], (string)$student['last_name'], (string)$student['email'], (string)$student['password']);
            }
        }
    }

    public function getStudents() : array {
        return $this->students;
    }

    public function countStudent(): int {
        return count($this->students);
    }


    public function displayStudent($id) {
        return $this->students[$id];
    }
}