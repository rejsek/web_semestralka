<?php
    require_once(DIRECTORY_CONTROLLERS . "/IController.interface.php");

    /**
     * Ovladac zajistujici vypsani uvodni stranky
     */
    class ArticleRating implements IController {
        
        /**
         * @var DatabaseModel $db       Sprava databaze
         */
        private $db;

        /**
         * @var SessionManager $session     Prace se Session
         */
        private $session;

        /**
         * Inicializace pripojeni k databazi
         */
        public function __construct() {
            
            // Inicializace prace s DB
            require_once(DIRECTORY_MODELS . "/DatabaseModel.class.php");
            $this->db = new DatabaseModel();

            // Inicializace prace se Session
            require_once(DIRECTORY_CONTROLLERS . "/SessionManager.class.php");
            $this->session = new SessionManager();
        }

        /**
         * Vrati obsah uvodni stranky.
         * @param string $pageTitle     Nazev stranky
         * @return string               Vypis v sablone
         */
        public function show(string $pageTitle):string {
            global $tplData;
            $tplData = [];
            // nazev
            $tplData['title'] = $pageTitle;                      

            if($_SESSION['logged_in']) {
                if($_SESSION['login_role'] != 1) {
                    $tplData['articles'] = $this->db->getAllArticles();
                } else {
                    $tplData['articles'] = $this->db->getAllArticlesById(htmlspecialchars($_SESSION['login_user_id']));
                }
            }

            ob_start();
            
            require_once(DIRECTORY_VIEWS . "/ArticleRatingTemplate.tpl.php");

            $content = ob_get_clean();
            
            return $content;
        }
    }
?>