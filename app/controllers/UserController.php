<?php

class UserController
{
    private $userModel;

    public function __construct()
    {
        require_once 'app/models/UserModel.php';
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $title = "Login";
        require_once 'app/views/user/templates/header.php';
        require_once 'app/views/user/index.php';
        require_once 'app/views/user/templates/footer.php';
    }

    public function register()
    {
        $title = "Register";
        require_once 'app/views/user/templates/header.php';
        require_once 'app/views/user/register.php';
        require_once 'app/views/user/templates/footer.php';
    }

    public function login()
    {
        // Proses penambahan pengguna ke database
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($dataUser = $this->userModel->addLogin($username, $password)) {
                $_SESSION['id-user'] = $dataUser['id'];
                $this->redirect('/short');
            } else {
                $this->redirect('/user');
            }
        }
    }

    public function storeRegister()
    {
        // Proses penambahan pengguna ke database
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeatPassword'];

            if ($this->userModel->addRegister($nama, $username, $password, $repeatPassword)) {
                $this->redirect('/user');
            } else {
                $this->redirect('/user/register');
            }
        }
    }

    public function logout()
    {
        session_unset();
        $this->redirect('/user');
    }

    private function redirect($url)
    {
        header('Location: ' . BASE_URL . $url);
        exit;
    }

}

?>