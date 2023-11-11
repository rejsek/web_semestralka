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
            
            // Bylo sticknuto tlacitko pro registraci ?
            if(isset($_POST['action']) and $_POST['action'] == "send") {
                $exists = $this->db->searchForUser($_POST["nick"]);

                if($exists) {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    Uživatelské jméno již exituje</div>";
                
                } else {
                    $result = $this->db->addUser($_POST["nick"], $_POST["email"], $_POST["passwd"]);

                    if($result) {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        Registrace probělhla v pořádku</div>";
                    }
                }
            }

            ob_start();
            
            require_once(DIRECTORY_VIEWS . "/UserRegistrationFormTemplate.tpl.php");

            $content = ob_get_clean();
            
            return $content;
        }
    }
?>