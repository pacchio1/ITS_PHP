<?php
#Pacchiotti
class User
{
    private $name;
    private $email;
    private $phone;

    public function __construct(string $name, string $email, string $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
    #Get
    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
    #Set
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
