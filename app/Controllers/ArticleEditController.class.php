<?php
    require_once(DIRECTORY_CONTROLLERS . "/IController.interface.php");

    /**
     * Ovladac zajistujici vypsani uvodni stranky
     */
    class ArticleEdit implements IController {
        
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
            $articleId = $_GET['id'];   //id rozkliknuteho profilu

            $tplData = [];
            // nazev
            $tplData['title'] = $pageTitle;
            // // data profilu
            $tplData['article_detail'] = $this->db->getArticleById($articleId);

            $result = false;
            
            if(isset($_POST['action']) and $_POST['action'] == "update") {
                $error = $_FILES["picture"]["error"];
                $uploads_dir = "";

                if($error == 0) {
                    $uploads_dir = '../web_semestralka/pictures/' . $_SESSION['login_user'];
    
                    if (!file_exists($uploads_dir)) {
                        mkdir($uploads_dir, 0755, true);
                    }
        
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["picture"]["tmp_name"];
                        $name = basename($_FILES["picture"]["name"]);
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    }
    
                    $uploads_dir .= '/' . $_FILES["picture"]["name"];
                }

                $result = $this->db->updateDataArticle($articleId, $_POST['title'], $uploads_dir, $_POST['text'], $_POST['rating']);

            } else if(isset($_POST['action']) and $_POST['action'] == "delete") {
                $result = $this->db->deleteArticle($articleId);
            
            } else if(isset($_POST['action']) and $_POST['action'] == "publish") {
                $result = $this->db->publishArticle($articleId, $_SESSION['login_user']);
            
            } else if(isset($_POST['action']) and $_POST['action'] == "unpublish") {
                $result = $this->db->unpublishArticle($articleId, $_SESSION['login_user']);
            }

            if($result) {
                header("Location: index.php?page=hodnoceni_clanku");
            }
            
            ob_start();
            // pripojim sablonu, cimz ji i vykonam
            require(DIRECTORY_VIEWS ."/ArticleEditTemplate.tpl.php");
            // ziskam obsah output bufferu, tj. vypsanou sablonu
            $content = ob_get_clean();

            // vratim sablonu naplnenou daty
            return $content;
        }
    }
?>