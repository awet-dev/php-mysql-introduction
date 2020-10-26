<?php


class Student extends Connection
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(int $id, string $firstName, string $lastName, string $email)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    //create students
    public function saveStudent(PDO $data)
    {
        $handle = $data->prepare('INSERT INTO student (first_name, last_name, email) VALUES (:first_name, :last_name, :email)');
        $handle->bindValue('first_name', ucfirst($this->getFirstName()));
        $handle->bindValue('last_name', ucfirst($this->getLastName()));
        $handle->bindValue('email', $this->getEmail());
        $handle->execute();
    }

    //save student
    public function save()
    {
        $this->saveStudent($this->openConnection());
    }


}