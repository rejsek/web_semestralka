<?php
    //////////////////////////////////////////////////////////////////
    ///////////// Soubor pro globalni nastaveni aplikace /////////////
    //////////////////////////////////////////////////////////////////

    // Pripojeni k databazi //

    /**
     * Adresa serveru
     */
    define("DB_SERVER", "localhost");

    /**
     * Nazev databaze
     */
    define("DB_NAME", "test");

    /**
     * Uzivatel databaze
     */
    define("DB_USER", "root");

    /**
     * Heslo uzivatele databaze
     */
    define("DB_PASSWORD", "");

    /**
     * Tabulka s clanky
     */
    define("TABLE_ARICLES", "clanky");

    /**
     * Tabulka s autory
     */
    define("TABLE_USERS", "autori");

    // Pripojeni k databazi //

    
    
    // Stranky webu //

    /**
     * Adresar kontroleru
     */
    const DIRECTORY_CONTROLLERS = "app\Controllers";

    /**
     * Adresar modelu
     */
    const DIRECTORY_MODELS = "app\Models";
    
    /** 
     * Adresar sablon 
     */
    const DIRECTORY_VIEWS = "app\Views";

    /** 
     * Klic defaultni webove stranky 
     */
    const DEFAULT_WEB_PAGE_KEY = "uvod";

    /** 
     * Dostupne webove stranky
     */
    const WEB_PAGES = array(
        
        //// Uvodni stranka ////
        "uvod" => array(
            "title" => "Úvodní stránka",

            //// kontroler
            "file_name" => "MainPageController.class.php",
            "class_name" => "MainPage",
        ),
        //// KONEC: Uvodni stranka ////

        //// Formular pro prihlaseni ////
        "prihlasovaci_formular" => array(
            "title"=> "Přihlašovací formulář",

            //// kontroler
            "file_name" => "UserLoginFormController.class.php",
            "class_name" => "UserLoginForm",
        ),
        //// KONEC: Formular pro prihlaseni ////

        //// Formular pro vytvoreni uctu ////
        "registracni_formular" => array(
            "title"=> "Registrační formulář",

            //// kontroler
            "file_name" => "UserRegistrationFormController.class.php",
            "class_name" => "UserRegistrationForm",
        ),
        //// KONEC: Formular pro vytvoreni uctu ////

        //// Detail zvoleneho clanku ////
        "detail_clanku" => array(
            "title"=> "Detail článku",

            //// kontroler
            "file_name" => "ArticleDetailController.class.php",
            "class_name" => "ArticleDetail",
        ),
        //// KONEC: Detail zvoleneho clanku ////
    );

    // Stranky webu //
?>