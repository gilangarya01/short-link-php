<?php

class RedirectShort
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

    public function getShortById($id)
    {
        $query = "SELECT * FROM shorts WHERE id = :id";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}

?>