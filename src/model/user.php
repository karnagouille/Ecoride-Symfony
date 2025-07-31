<?php
namespace App\model;

class user {
    private string $email;
    private string $password;

    public function __construct(string $email, string $password){
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function saveToDatabase(): bool {
        $host = 'localhost';
        $username = 'admin';    
        $password = 'admin';
        $dbname = 'mvc';

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$conn) {
            return false;
        // gestion  d'erreur
        }

        $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $resultats = $stmt->get_result();

        if ($resultats->num_rows > 0) {
            $stmt->close();
            $conn->close();
            return false; 
        // utilisateur déjà existant
        }

        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->email, $this->password);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        return true; 
    // insertion réussie
    }
}
