<?php
    /**
     * Trida spravujici databazi
     */
    class DatabaseModel {

        /**
         * Odjekt pracujici s databazi prostrednictvim PDO
         */
        private $pdo;

        /**
         * Inicializace pripojeni k databazi
         */
        public function __construct() {
            $this->pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->exec("set names utf8"); // vynuceni kodovani UTF8
        }

        /**
         * Vrati seznam vsech clanku
         */
        public function getAllArticles():array {
            $sql = "SELECT * FROM " . TABLE_ARICLES;

            return $this->pdo->query($sql)->fetchAll();
        }

        /**
         * Vrati detailni informace o clanku
         */
        public function getArticleById(int $id):array {
            $sql = "SELECT * FROM " . TABLE_ARICLES . " WHERE id_clanku=" . $id;

            return $this->pdo->query($sql)->fetchAll();
        }

        /**
         * Prida uzivatele do databaze
         */
        public function addUser(string $username, string $email, string $password):bool {
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO " . TABLE_USERS . " (uz_jmeno, email, heslo) VALUES ('" . $username . "', '" . $email . "', '" . $hashPassword . "')";
            
            $result = $this->pdo->exec($sql);
            return $result;
        }
    }
?>