<?php

require_once "database_handler.php";

class User extends DatabaseHandler {

    public function __construct($username, $password, $role, $createdAt = null) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($createdAt === null) {
            $createdAt = date('Y-m-d H:i:s');
        }

        $sql = "INSERT INTO users (username, password, role, created_at) 
        VALUES (:username, :password, :role, :created_at)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindParam(':username',$username, PDO::PARAM_STR);
        $stmt->bindParam(':password',$hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':role',$role, PDO::PARAM_STR);
        $stmt->bindParam(':created_at',$createdAt, PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Method to fetch all users
    public function getAllUsers() {
        $sql = "SELECT * from users";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    // Method to fetch a user by their username
    public function getUserByName($username) {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':username',$username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

}