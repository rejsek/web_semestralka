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
    define("DB_NAME", "web_semestralka");

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
    define("TABLE_USERS", "uzivatele");

    /**
     * Tabulka s rolemi
     */
    define("TABLE_ROLES", "role");

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

        //// Detail profilu ////
        "detail_profilu" => array(
            "title"=> "Detail profilu",

            //// kontroler
            "file_name" => "ProfileDetailController.class.php",
            "class_name" => "ProfileDetail",
        ),
        //// KONEC: Detail profilu ////

        //// Formular na pridani clanku ////
        "pridat_clanek" => array(
            "title"=> "Přidání článku",

            //// kontroler
            "file_name" => "AddArticleController.class.php",
            "class_name" => "AddArticle",
        ),
        //// KONEC: Formular na pridani clanku ////

        //// Formular na spravu uzivatelu ////
        "sprava_uzivatelu" => array(
            "title"=> "Správa uživatelů",

            //// kontroler
            "file_name" => "UsersAdministration.class.php",
            "class_name" => "UsersAdministration",
        ),
        //// KONEC: Formular na sprava uzivatelu ////

        //// Formular na editaci uzivatele ////
        "editace_uzivatele" => array(
            "title"=> "Editace uživatele",

            //// kontroler
            "file_name" => "UserEdit.class.php",
            "class_name" => "UserEdit",
        ),
        //// KONEC: Formular na editaci uzivatele ////

        //// Formular na hodnoceni clanku ////
        "hodnoceni_clanku" => array(
            "title"=> "Hodnocení článků",

            //// kontroler
            "file_name" => "ArticleRatingController.class.php",
            "class_name" => "ArticleRating",
        ),
        //// KONEC: Formular na hodnoceni clanku ////

        //// Formular na editaci clanku ////
        "editace_clanku" => array(
            "title"=> "Editace článků",

            //// kontroler
            "file_name" => "ArticleEditController.class.php",
            "class_name" => "ArticleEdit",
        ),
        //// KONEC: Formular na editaci clanku ////
    );

    // KONEC: Stranky webu //
?>