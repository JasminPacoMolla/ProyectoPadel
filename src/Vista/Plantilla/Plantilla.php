<?php

namespace Vista\Plantilla;

class plantilla
{
private string $encabezado;
private string $nav;
private string $footer;

    public function __construct($titulo,$opcionesMenu=['Inicio'=>'index.php','Contacto'=>'contacto.php','Sobre Nosotros'=>'about.php']) {
        $this->generarEncabezado($titulo);
        $this->generarBarraNavegacion($opcionesMenu);
        $this->generarFooter();
    }


    public function generarEncabezado($titulo){
        $this->encabezado = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    
                      <head>
                    
                        <meta charset='utf-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <meta name='description' content=''>
                        <meta name='author' content=''>
                        <link href='https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap' rel='stylesheet'>
                    
                        <title>$titulo</title>
                    <!--
                    
                    TemplateMo 548 Training Studio
                    
                    https://templatemo.com/tm-548-training-studio
                    
                    -->
                        <!-- Additional CSS Files -->
                        <link rel='stylesheet' type='text/css' href='assets/css/bootstrap.min.css'>
                    
                        <link rel='stylesheet' type='text/css' href='assets/css/font-awesome.css'>
                    
                        <link rel='stylesheet' href='assets/css/templatemo-training-studio.css'>
                    
                        </head>
                        
                        <body>
                        
                        <!-- ***** Preloader Start ***** -->
                        <div id='js-preloader' class='js-preloader'>
                          <div class='preloader-inner'>
                            <span class='dot'></span>
                            <div class='dots'>
                              <span></span>
                              <span></span>
                              <span></span>
                            </div>
                          </div>
                        </div>";
    }



    public function generarBarraNavegacion(array $opcionesMenu,string $dirLogo="/assets/img/logo.png"){
        $this->nav = "
                    <header class='header-area header-sticky'>
                      <div class='container'>
                          <div class='row'>
                              <div class='col-12'>
                                  <nav class='main-nav'>
                                      <!-- ***** Logo Start ***** -->
                                      
                                     
                                      <a href='index.html' class='logo'> <img src='$dirLogo'></a>
                                      <!-- ***** Logo End ***** -->
                                      <!-- ***** Menu Start ***** -->
                                      <ul class='nav'>";
                                        foreach ($opcionesMenu as $opcion=>$enlace){
                                            echo " <li class='scroll-to-section'><a href='#top' class='active'>".strtoupper($opcion)."</a></li>";
                                        }
                                    $this->nav.=/*"

                                          <li class='scroll-to-section'><a href='#top' class='active'>Home</a></li>
                                          <li class='scroll-to-section'><a href='#features'>About</a></li>
                                          <li class='scroll-to-section'><a href='#our-classes'>Classes</a></li>
                                          <li class='scroll-to-section'><a href='#schedule'>Schedules</a></li>
                                          <li class='scroll-to-section'><a href='#contact-us'>Contact</a></li>
                                          <li class='main-button'><a href='#'>Sign Up</a></li>
                                      </ul> */"       
                                      <a class='menu-trigger'>
                                          <span>Menu</span>
                                      </a>
                                      <!-- ***** Menu End ***** -->
                                  </nav>
                              </div>
                          </div>
                      </div>
                    </header>";
    }

    public function generarFooter(){
        $this->footer = "
                      <footer>
                            <div class='container'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <p>Copyright &copy; 2020 Cobra Padel
                                        
                                        <!-- Designed by <a rel='nofollow' href='https://templatemo.com' class='tm-text-link' target='_parent'>TemplateMo</a></p>->
                                        
                                        <!-- You shall support us a little via PayPal to info@templatemo.com -->
                                        
                                    </div>
                                </div>
                            </div>
                        </footer>
                        
                        <!-- jQuery -->
                        <script src='assets/js/jquery-2.1.0.min.js'></script>
                        
                        <!-- Bootstrap -->
                        <script src='assets/js/popper.js'></script>
                        <script src='assets/js/bootstrap.min.js'></script>
                        
                        <!-- Plugins -->
                        <script src='assets/js/scrollreveal.min.js'></script>
                        <script src='assets/js/waypoints.min.js'></script>
                        <script src='assets/js/jquery.counterup.min.js'></script>
                        <script src='assets/js/imgfix.min.js'></script> 
                        <script src='assets/js/mixitup.js'></script> 
                        <script src='assets/js/accordions.js'></script>
                        
                        <!-- Global Init -->
                        <script src='assets/js/custom.js'></script>
                        
                        </body>
                        </html>
        
        ";
    }
    public function generarTodaLaPagina():string{
        $salida = $this->encabezado;
        $salida.=$this->nav;
        $salida.=$this->footer;

        return $salida;
    }
}