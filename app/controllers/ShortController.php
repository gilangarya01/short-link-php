<?php

class ShortController
{
    private $shortModel;

    public function __construct()
    {
        $this->isLogged();

        require_once 'app/models/ShortModel.php';
        $this->shortModel = new ShortModel();
    }

    public function index()
    {
        $id_user = $_SESSION["id-user"];

        $title = "Listku";
        $user = $this->shortModel->getUserById($id_user);
        $shorts = $this->shortModel->getAllShorts($id_user);
        require_once 'app/views/short/templates/header.php';
        require_once 'app/views/short/index.php';
        require_once 'app/views/short/templates/footer.php';
    }

    public function create()
    {
        $id_user = $_SESSION["id-user"];

        if (isset($_SESSION["dataShortUrl"])) {
            $longUrl = $_SESSION["dataShortUrl"][0];
            $shortUrl = $_SESSION["dataShortUrl"][1];
            unset($_SESSION["dataShortUrl"]);
        }

        $title = "Add";
        $user = $this->shortModel->getUserById($id_user);
        require_once 'app/views/short/templates/header.php';
        require_once 'app/views/short/create.php';
        require_once 'app/views/short/templates/footer.php';
    }

    public function store()
    {
        // Proses penambahan pengguna ke database
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idUser = $_POST['idUser'];
            $url = $_POST['url'];

            $idShort = $this->shortModel->addURL($idUser, $url);
            $_SESSION['id_short'] = $idShort;
            $this->redirect('/short/create');
        }
    }

    public function delete($id)
    {
        // Proses penghapusan pengguna dari database
        $this->shortModel->deleteShort($id);
        // Redirect atau tampilkan pesan sukses
        $this->redirect('/short');
    }

    public function edit($id)
    {
        $id_user = $_SESSION["id-user"];

        $title = "Edit Url";
        $user = $this->shortModel->getUserById($id_user);

        $dataUrl = $this->shortModel->getShortById($id);
        require_once 'app/views/short/templates/header.php';
        require_once 'app/views/short/edit.php';
        require_once 'app/views/short/templates/footer.php';
    }

    public function update()
    {
        // Proses pembaruan data pengguna di database
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idUrl = $_POST['idUrl'];
            $longUrl = $_POST['longUrl'];

            if ($this->shortModel->updateShort($idUrl, $longUrl) > 0) {
                # code...
                $this->redirect('/short');
            } else {
                $this->redirect('/short/edit/' . $idUrl);
            }
            // Redirect atau tampilkan pesan sukses
        }
    }

    private function redirect($url)
    {
        header('Location: ' . BASE_URL . $url);
        exit;
    }

    private function isLogged()
    {
        if (!isset($_SESSION['id-user'])) {
            $this->redirect('/user');
        }
    }

}

?>