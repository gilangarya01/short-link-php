<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addLogin($username, $password)
    {
        $query = 'SELECT * FROM users WHERE username=:username';
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $hashedPassword = $row['password'];

            // Cek password
            if (password_verify($password, $hashedPassword)) {
                unset($row['password']);

                return $row;
            }
        }

        // Jika login gagal atau data tidak ditemukan
        $_SESSION["error"] = true;
        return false;
    }

    public function addRegister($nama, $username, $password, $repeatPassword)
    {
        // Cek password length
        if (strlen($password) < 6) {
            $_SESSION["error"] = "Password harus lebih dari 6 character";
            return 0;
        }

        // Cek repeat password
        if ($password != $repeatPassword) {
            $_SESSION["error"] = "Password dan Repeat Password harus sama";
            return 0;
        }

        // Check jika username telah tersedia
        $checkUser = "SELECT id FROM users WHERE username = :username";
        $checkUsername = $this->db->connect()->prepare($checkUser);
        $checkUsername->bindParam(':username', $username);
        $checkUsername->execute();

        if ($checkUsername->rowCount() > 0) {
            $_SESSION["error"] = "Username sudah tersedia di database";
            return 0;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (nama, username, password) VALUES (:nama, :username, :password)";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

}

?>