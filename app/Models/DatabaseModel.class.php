<?php
    /**
     * Trida spravujici databazi
     */
    class DatabaseModel {

        /**
         * Objekt pracujici s databazi prostrednictvim PDO
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
         * Vrati detailni informace o profilu
         */
        public function getProfileByName(string $username):array {
            $sql = "SELECT * FROM " . TABLE_USERS . " WHERE uz_jmeno='" . $username . "'";

            return $this->pdo->query($sql)->fetchAll();
        }

        /**
         * Prida uzivatele do databaze
         */
        public function addUser(string $username, string $email, string $password, int $role):bool {
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO " . TABLE_USERS . " (uz_jmeno, email, heslo, role) VALUES ('" . $username . "', '" . $email . "', '" . $hashPassword . "', '" . $role . "')";
            
            $result = $this->pdo->exec($sql);
            return $result;
        }

        /**
         * Zjisti, zda se uzivatel vyskytuje v databazi - podle uz_jmena
         */
        public function searchForUser(string $username):bool {
            $sql = "SELECT COUNT(*) FROM ". TABLE_USERS ." WHERE uz_jmeno=:username";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $result = intval($stmt->fetchColumn());

            if($result == 0) {
                return false;
            } else {
                return true;
            }
        }

        /**
         * Zjisti, zda se uzivatel vyskutuje v databazi - podle uz_jmena a hesla
         */
        public function loginUser(string $username, string $password):bool {
            $sql = "SELECT * FROM " . TABLE_USERS . " WHERE uz_jmeno = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username);

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // Pokud uživatel neexistuje, vrátím false
            if (!$user) {
                return false;
            }

            // Ověříme zadané heslo s uloženým hashem hesla
            if (password_verify($password, $user['heslo'])) {
                // Hesla se shodují, vrátím true
                return true;
            } else {
                // Hesla se neshodují, vrátím false
                return false;
            }
        }

        /**
         * Prida clanek do databaze
         */
        public function addArticle(string $title, string $text, string $username):bool {
            $rating = 0;

            $sql = "INSERT INTO ". TABLE_ARICLES . " (titulek, text, autor, hodnoceni) VALUES ('" . $title . "', '" . $text . "', '" . $username . "', '" . $rating . "')";
            
            $result = $this->pdo->exec($sql);
            return $result;
        }

        /**
         * Vrati roli na zaklade jmena uzivatele
         */
        public function getRole(string $username):int {
            $sql = "SELECT role FROM ". TABLE_USERS . " WHERE uz_jmeno=:username";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':username', $username);

            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return intval($data['role']);
        }

        /**
         * Vrati vsechny uzivatele obsazene v databazi - bez admina
         */
        public function getUsers():array {
            $sql = "SELECT * FROM " . TABLE_USERS . " WHERE role < 3";

            return $this->pdo->query($sql)->fetchAll();
        }

        /**
         * Upravi informace o danem uzivateli
         */
        public function updateDataUser($username, $email, $role, $user):bool {
            $sql = "UPDATE ". TABLE_USERS . " SET uz_jmeno='" . $username . "', email='" . $email . "', role='" . $role . "' WHERE uz_jmeno='" . $user . "'";

            $result = $this->pdo->exec($sql);
            return $result;
        }

        /**
         * Smaze uzivatele z databaze
         */
        public function deleteUser($username) {
            $sql = "DELETE FROM ". TABLE_USERS . " WHERE uz_jmeno='" . $username . "'";

            $result = $this->pdo->exec($sql);
            return $result;
        }
    }
?>