<?php
    require_once(DIRECTORY_CONTROLLERS . "/IController.interface.php");

    /**
     * Ovladac zajistujici vypsani stranky s prihlasovacim formularem
     */
    class UserLoginForm implements IController {
        
        /**
         * @var DatabaseModel $db       Sprava databaze
         */
        private $db;

        /**
         * Inicializace pripojeni k databazi
         */
        public function __construct() {
            
            // Inicializace prace s DB
            require_once(DIRECTORY_MODELS . "/DatabaseModel.class.php");
            $this->db = new DatabaseModel();
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

            ob_start();
            
            require_once(DIRECTORY_VIEWS . "/UserLoginFormTemplate.tpl.php");

            $content = ob_get_clean();
            
            return $content;
        }
    }
?>