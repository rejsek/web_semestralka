<?php
    /**
     * Trida vypisujici HTML hlavicku a paticku stanky
     */
    class Templates {
        
        /**
         * Vrati hlavicku HTML stranky
         * @param string $pageTitle     Nazev stranky
         */
        public function getHeader(string $pageTitle) {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                    <link rel="stylesheet" href="style.css">

                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title><?php echo $pageTitle; ?></title>
                </head>
                <body>
                <!--Navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a id="icon" class="navbar-brand" href="index.php?page=uvod">
                    <i class="fa fa-comments"></i>
                    Konference
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=uvod">Domů</a>
                        </li>
                        <li class="nav-item">
                        </li>

                        <?php
                            if(!empty($_SESSION['login_user'])) {

                                switch($_SESSION['login_role']) {
                                    case 1:
                                        $this->showRole1();
                                        $this->showRole2();
                                        
                                        break;

                                    case 2:
                                        $this->showRole2();
                                        
                                        break;

                                    case 3:
                                        $this->showRole3();
                                        
                                        break;
                                }
                            }
                        ?>

                    </ul>
                    <span class="navbar-text">

                        <!--Vypis prihlaseneho uzivatele-->
                        <?php
                            if(!empty($_SESSION['login_user'])) {
                                $res = "<a id='login_icon' href='index.php?page=detail_profilu&name=" . $_SESSION["login_user"] ."'>";
                                $res .= "<i class='fa fa-address-book'></i> " . $_SESSION['login_user'];
                                
                                echo $res;
                            } else {
                                $res = "<a id='login_icon' href='index.php?page=prihlasovaci_formular'>";
                                $res .= "<i class='fa fa-user-circle'></i>";

                                echo $res;
                            }
                        ?>

                        </a>
                    </span>
                    </div>
                </nav>
                <!--Navigation-->
            <?php
        }

        /**
         * Zobrazi hodnoceni, pocet hvezdicek, daneho clanku
         */
        public function show_starts($rating) {            
            $other = 5 - $rating;
            $res = "";
    
            for($i = 0; $i < 5; $i++) {
                if ($rating > 0) {
                    $res .= '<span class="fa fa-star checked"></span>';
                    $rating = $rating - 1;
                }
    
                if ($other > 0 and $rating == 0) {
                    $res .= '<span class="fa fa-star"></span>';
                    $other = $other - 1;
                }
            }

            return $res;
        }

        /**
         * Vrati paticku HTML stranky
         */
        public function getFooter() {
            ?>
                <!--Footer-->
                <footer class="bg-light text-center text-lg-start">  
                    <!-- Copyright -->
                    <div class="bg-light  text-center p-3">
                    © 2020 Copyright:
                    <a class="text-dark">Daniel Riess</a>
                    </div>
                    <!-- Copyright -->
                </footer>
                <!--Footer-->
                </body>
                </html>
            <?php
        }

        /**
         * Ukaze moznosti pro roli = 1
         */
        private function showRole1() {
            $res = "<li class='nav-item'>";
            $res .= "<a class='nav-link' href='index.php?page=pridat_clanek'>Přidat článek</a>";
            $res .= "</li>";

            echo $res;
        }

        /**
         * Ukaze moznosti pro roli = 2
         */
        private function showRole2() {
            $res = "<li class='nav-item'>";
            $res .= "<a class='nav-link' href='index.php?page=hodnoceni_clanku'>Procházet články</a>";
            $res .= "</li>";

            echo $res;
        }

        private function showRole3() {
            $this->showRole1();
            $this->showRole2();

            $res = "<li class='nav-item'>";
            $res .= "<a class='nav-link' href='index.php?page=sprava_uzivatelu'>Procházet  uživatele</a>";
            $res .= "</li>";

            echo $res;
        }
    }
?>