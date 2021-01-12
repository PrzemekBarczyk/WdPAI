<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users_details ud LEFT JOIN users u
            ON u.id_user_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) // user not found
            return null;

        return new User(
            $user['email'],
            $user['phone'],
            $user['location'],
            $user['password'],
            $user['id']
        );
    }

    public function addUser(User $user) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (phone, location)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getPhone(),
            $user->getLocation(),
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_user_details)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }

    public function getUserDetailsId(User $user): int {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE phone = :phone AND location = :location
        ');
        $phone = $user->getPhone();
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $location = $user->getLocation();
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}