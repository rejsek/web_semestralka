<?php
    require_once(DIRECTORY_CONTROLLERS . "/IController.interface.php");

    /**
     * Ovladac zajistujici vypsani uvodni stranky
     */
    class ProfileDetail implements IController {
        
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
            //// vsechna data sablony budou globalni
            global $tplData;
            $profileName = $_GET['name'];   //id rozkliknuteho profilu

            $tplData = [];
            // nazev
            $tplData['title'] = $pageTitle;
            // data profilu
            $tplData['profile_detail'] = $this->db->getProfileByName($profileName);

            //// vypsani prislusne sablony
            // zapnu output buffer pro odchyceni vypisu sablony

            if(isset($_POST['action']) and $_POST['action'] == "logout") {
                $this->session->logoutUser();
            }

            ob_start();
            // pripojim sablonu, cimz ji i vykonam
            require(DIRECTORY_VIEWS ."/ProfileDetailTemplate.tpl.php");
            // ziskam obsah output bufferu, tj. vypsanou sablonu
            $content = ob_get_clean();

            // vratim sablonu naplnenou daty
            return $content;
        }
    }
?>