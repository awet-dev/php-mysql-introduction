<?php

declare(strict_types=1);
class Database
{
    private array $allStudents;


    // connection to the database
    public function openConnection() : PDO {

        $dbHost     = "localhost";
        $dbUser     = "becode";
        $dbPassword = "becode123";
        $dbName     = "studentData";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO('mysql:host='. $dbHost .';dbname='. $dbName, $dbUser, $dbPassword, $driverOptions);
    }



    public function saveStudent($student)
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO student (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)');
        $handle->bindValue('first_name', ucfirst($student->getFirstName()));
        $handle->bindValue('last_name', ucfirst($student->getLastName()));
        $handle->bindValue('email', $student->getEmail());
        $handle->bindValue('password', $student->getPassword());
        $handle->execute();
    }


    // get data form the database
    public function loadStudents() {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM student');
        $statement->execute();
        $students = $statement->fetchAll();
        foreach ($students as $student) {
            $this->allStudents[$student['id']] = new Student((int)$student['id'], (string)$student['first_name'], (string)$student['last_name'], (string)$student['email'], (string)$student['password']);
        }
    }

    // delete data from the database
    public function deleteStudent($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue('id', $id);
        $handle->execute();
    }


    // get student from the data base
    public function getStudent($id): array
    {
        $pdo = $this->openConnection();
        $handler = $pdo->prepare('SELECT first_name, last_name, email, password FROM student WHERE id = :id');
        $handler->bindValue(':id', $id);
        $handler->execute();
        return $handler->fetch();
    }

    public function updateStudent($student, $id)
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE student SET first_name = :first_name, last_name = :last_name, email = : email, password = :password WHERE id = :id');
        $handle->bindValue('name', $student->getFirstName());
        $handle->bindValue('name', $student->getLastName());
        $handle->bindValue('email', $student->getEmail());
        $handle->bindValue('class_id', $student->getPassword());
        $handle->bindValue('id', $id);
        $handle->execute();
    }

    public function getStudents() {
        $this->loadStudents();
        return $this->allStudents;
    }

    public function countStudents() {
        $this->loadStudents();
        return count($this->allStudents);
    }



}