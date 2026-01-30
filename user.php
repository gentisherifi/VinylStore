<?php
class User {
    private $conn;
    private $table = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $surname, $email, $password) {
        $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table} (name,surname,email,password) VALUES (:name,:surname,:email,:password)"
        );
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':surname',$surname);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$hashed);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE email=:email LIMIT 1");
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password,$user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
        }
        return false;
    }
}
?>