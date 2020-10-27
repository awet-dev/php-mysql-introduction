<?php


class Student extends Connection
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;

    public function __construct(int $id, string $firstName, string $lastName, string $email, string $password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
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

    public function getPassword(): string
    {
        return $this->password;
    }


    //create students
    public function saveStudent(PDO $data)
    {
        $handle = $data->prepare('INSERT INTO student (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)');
        $handle->bindValue('first_name', ucfirst($this->getFirstName()));
        $handle->bindValue('last_name', ucfirst($this->getLastName()));
        $handle->bindValue('email', $this->getEmail());
        $handle->bindValue('password', $this->getPassword());
        $handle->execute();
    }

    //save student
    public function save()
    {
        $this->saveStudent($this->openConnection());
    }


}