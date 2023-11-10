<?php

    /**
     * Vstupni bod webove aplikace
     */
    class ApplicationStart {

        /**
         * Inicializace webove aplikace
         */
        public function __construct() {
            
            // Nacteni rozhrani kontroleru //
            require_once(DIRECTORY_CONTROLLERS . "/IController.interface.php");
        }

        /**
         * Spusteni webove aplikace
         */
        public function appStart() {
            
            if(isset($_GET["page"]) && array_key_exists($_GET["page"], WEB_PAGES)){
                $pageKey = $_GET["page"]; // nastavim pozadovane
            } else {
                $pageKey = DEFAULT_WEB_PAGE_KEY; // defaulti klic
            }

            $pageInfo = WEB_PAGES[$pageKey];
    
            require_once(DIRECTORY_CONTROLLERS ."/". $pageInfo["file_name"]);

            $controller = new $pageInfo["class_name"];

            echo $controller->show($pageInfo["title"]);
        }
    }
?>