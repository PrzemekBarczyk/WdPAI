<?php


class User
{
    private $email;
    private $phone;
    private $location;
    private $password;

    public function __construct(string $email, string $phone, string $location, string $password) {
        $this->email = $email;
        $this->phone = $phone;
        $this->location = $location;
        $this->password = $password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function setLocation(string $location) {
        $this->location = $location;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }
}