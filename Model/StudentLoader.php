<?php


class StudentLoader extends Connection
{
    private array $students;

    /**
     * StudentLoader constructor.
     * @param array $student
     */
    public function __construct()
    {
        if (empty($this->student)) {
            $pdo = $this->openConnection();
            $statement = $pdo->prepare('SELECT * FROM student');
            $statement->execute();
            $students = $statement->fetchAll();
            foreach ($students as $student) {
                $this->students[$student['id']] = new Student((string)$student['first_name'], (string)$student['last_name'], (string)$student['email']);
            }
        }
    }

    public function getStudents() : array {
        return $this->students;
    }


}