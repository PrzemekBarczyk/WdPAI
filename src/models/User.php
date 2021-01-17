<?php


class User
{
    private $email;
    private $phone;
    private $location;
    private $password;
    private $permissions;
    private $id;

    public function __construct(string $email, string $phone, string $location, string $password, string $permissions="user", $id=null) {
        $this->email = $email;
        $this->phone = $phone;
        $this->location = $location;
        $this->password = $password;
        $this->permissions = $permissions;
        $this->id = $id;
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

    public function getPermissions(): string {
        return $this->permissions;
    }

    public function setPermissions(string $permissions) {
        $this->permissions = $permissions;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }
}