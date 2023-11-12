<?php
    require_once(DIRECTORY_CONTROLLERS . "/IController.interface.php");

    /**
     * Ovladac zajistujici vypsani stranky s prihlasovacim formularem
     */
    class UserRegistrationForm implements IController {
        
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
         * Vrati obsah stranky s prihlasovacim formularem
         * @param string $pageTitle     Nazev stranky
         * @return string               Vypis v sablone
         */
        public function show(string $pageTitle):string {
            //// vsechna data sablony budou globalni
            global $tplData;
            $tplData = [];
            // nazev
            $tplData['title'] = $pageTitle;
            
            if(isset($_POST['action']) and $_POST['action'] == "send") {
                $this->session->addUser($_POST["nick"], $_POST["email"], $_POST["passwd"]);
            }

            ob_start();
            
            require_once(DIRECTORY_VIEWS . "/UserRegistrationFormTemplate.tpl.php");

            $content = ob_get_clean();
            
            return $content;
        }
    }
?>