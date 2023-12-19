<?php

    /**
     * Session manager
     */
    class SessionManager {

        /**
         * @var DatabaseModel $db       Sprava databaze
         */
        private $db;

        /**
         * Inicializace pripojeni k databazi
         */
        public function __construct() {
            session_start();
            $this->db = new DatabaseModel();
        }

        /**
         * Prihlasi uzivatele
         */
        public function loginUser(string $username, string $password) {
            $isLogged = $this->db->loginUser($username, $password);

            if ($isLogged) {
                $_SESSION['logged_in']  = true;
                $_SESSION['login_user_id'] = $this->db->getId($username);
                $_SESSION['login_user'] =  htmlspecialchars($username);
                $_SESSION['login_role'] =  $this->db->getRole($username);

                header("Location: index.php?page=uvod");

            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Špatné přihlašovací údaje</div>";
            }
        }

        /**
         * Pridani clanku do databaze
         */
        public function addArticle(string $title, string $text) {
            $uploads_dir = '../web_semestralka/pictures/' . htmlspecialchars($_SESSION['login_user']);
            $error = $_FILES["picture"]["error"];

            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0755, true);
            }

            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["picture"]["tmp_name"];
                $name = basename($_FILES["picture"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
            }

            $uploads_dir .= '/' . $_FILES["picture"]["name"];

            $this->db->addArticle(htmlspecialchars($title), htmlspecialchars($uploads_dir), htmlspecialchars($text), htmlspecialchars($_SESSION['login_user_id']));
        }

        /**
         * Prida uzivatele do databaze a nasledne ho prihlasi
         */
        public function addUser(string $username, string $email, string $password) {
            $exists = $this->db->searchForUser(htmlspecialchars($_POST["nick"]));

            if($exists) {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Uživatelské jméno již exituje</div>";
            
            } else {
                $result = $this->db->addUser(htmlspecialchars($_POST["nick"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["passwd"]), 1);

                if($result) {
                    $_SESSION['logged_in']  = true;
                    $_SESSION['login_user_id'] = $this->db->getId($username);
                    $_SESSION['login_user'] =  htmlspecialchars($username);
                    $_SESSION['login_role'] =  $this->db->getRole(htmlspecialchars($username));

                    header("Location: index.php?page=uvod");
                    
                    // echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    // <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    // Registrace probělhla v pořádku</div>";
                }
            }
        }

        /**
         * Odhlasi uzivatele a zrusi Session
         */
        public function logoutUser() {
            $_SESSION = array();

            session_destroy();

            header("Location: index.php?page=uvod");

            exit;
        }
    }
?>