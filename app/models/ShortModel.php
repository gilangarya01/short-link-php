<?php

class ShortModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function shortRedirect($short_url)
    {
        $query = "SELECT * FROM shorts WHERE short_url = :short_url";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':short_url', $short_url);
        $stmt->execute();

        if ($url = $stmt->fetch(PDO::FETCH_ASSOC)) {
            header('Location: ' . $url['long_url']);
            exit;
        }
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getShortById($id)
    {
        $query = "SELECT * FROM shorts WHERE id = :id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllShorts($idUser)
    {
        $query = "SELECT * FROM shorts WHERE id_user=" . $idUser;
        $stmt = $this->db->connect()->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUrl($idUser, $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            $_SESSION["error"] = "URL tidak valid";
            return false;
        }

        $shortUrl = $this->getRandom();

        $query = "INSERT INTO shorts (id_user, long_url, short_url) VALUES (:idUser, :longUrl, :shortUrl)";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':longUrl', $url);
        $stmt->bindParam(':shortUrl', $shortUrl);

        if ($stmt->execute() > 0) {
            $_SESSION['dataShortUrl'] = array($url, $shortUrl);
            return true;
        }

        return false;
    }

    public function deleteShort($id)
    {
        $query = "DELETE FROM shorts WHERE id = :id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateShort($idUrl, $longUrl)
    {
        if (filter_var($longUrl, FILTER_VALIDATE_URL) === false) {
            $_SESSION["error"] = "URL tidak valid";
            return false;
        }

        $query = "UPDATE shorts SET long_url = :long_url WHERE id = :id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $idUrl);
        $stmt->bindParam(':long_url', $longUrl);
        return $stmt->execute();
    }

    private function getRandom()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

}

?>