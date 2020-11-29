<?php

declare(strict_types=1);
class Database
{
    // connection to the database
    public function openConnection() : PDO {
        require "View/config.php";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO('mysql:host='. $dbHost .';dbname='. $dbName, $dbUser, $dbPassword, $driverOptions);
    }

    // create student into database
    public function createStudent(Student $student)
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('INSERT INTO student (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)');
        $handle->bindValue('first_name', ucfirst($student->getFirstName()));
        $handle->bindValue('last_name', ucfirst($student->getLastName()));
        $handle->bindValue('email', $student->getEmail());
        $handle->bindValue('password', $student->getPassword());
        $handle->execute();
        $student->setId((int)$pdo->lastInsertId());
        return $student->getId();
    }

    // read all students form the database
    public function getStudents($array=[]) {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM student');
        $statement->execute();
        $students = $statement->fetchAll();
        foreach ($students as $student) {
            $person = new Student((string)$student['first_name'], (string)$student['last_name'], (string)$student['email'], (string)$student['password']);
            $person->setId(intval($student['id']));
            array_push($array, $person);
        }
        return $array;
    }

    // read student from the data base
    public function getStudent($id): Student
    {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM student WHERE id=:id');
        $statement->bindValue('id', $id);
        $statement->execute();
        $student = $statement->fetch();
        $person = new Student((string)$student['first_name'], (string)$student['last_name'], (string)$student['email'], (string)$student['password']);
        $person->setId(intval($id));
        return $person;
    }

    // read student from the data base
    public function logInStudent($email): Student
    {
        $pdo = $this->openConnection();
        $statement = $pdo->prepare('SELECT * FROM student WHERE email=:email');
        $statement->bindValue('email', $email);
        $statement->execute();
        $student = $statement->fetch();
        $person = new Student((string)$student['first_name'], (string)$student['last_name'], (string)$student['email'], (string)$student['password']);
        $person->setId(intval($student['id']));
        return $person;
    }

    // update student from the database
    public function updateStudent($first_name, $last_name, $email, $hashed_password, $id)
    {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('UPDATE student SET first_name=:first_name, last_name=:last_name, email=:email, password=:password WHERE id=:id');
        $handle->bindValue('first_name', $first_name);
        $handle->bindValue('last_name', $last_name);
        $handle->bindValue('email', $email);
        $handle->bindValue('password', $hashed_password);
        $handle->bindValue('id', $id);
        $handle->execute();
    }

    // delete student from the database
    public function deleteStudent($id) {
        $pdo = $this->openConnection();
        $handle = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue('id', $id);
        $handle->execute();
    }

}