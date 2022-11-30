<?php

namespace app\Vista\Plantillas;

class Plantilla
{
private string $encabezado;
private string $nav;
private string $footer;
private string $bloquePresentacion;
private string $bloqueDosColumnas;
private string $bloqueTestimonio;
private string $bloqueServicios;
private string $bloquePrecios;
private string $bloqueEmpleados;
private string $body;

    /**
     * @return string
     */
    public function getEncabezado(): string
    {
        return $this->encabezado;
    }

    /**
     * @param string $encabezado
     * @return Plantilla
     */
    public function setEncabezado(string $encabezado): Plantilla
    {
        $this->encabezado = $encabezado;
        return $this;
    }

    /**
     * @return string
     */
    public function getNav(): string
    {
        return $this->nav;
    }

    /**
     * @param string $nav
     * @return Plantilla
     */
    public function setNav(string $nav): Plantilla
    {
        $this->nav = $nav;
        return $this;
    }

    /**
     * @return string
     */
    public function getFooter(): string
    {
        return $this->footer;
    }

    /**
     * @param string $footer
     * @return Plantilla
     */
    public function setFooter(string $footer): Plantilla
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @return string
     */
    public function getBloquePresentacion(): string
    {
        return $this->bloquePresentacion;
    }

    /**
     * @param string $bloquePresentacion
     * @return Plantilla
     */
    public function setBloquePresentacion(string $bloquePresentacion): Plantilla
    {
        $this->bloquePresentacion = $bloquePresentacion;
        return $this;
    }

    /**
     * @return string
     */
    public function getBloqueDosColumnas(): string
    {
        return $this->bloqueDosColumnas;
    }

    /**
     * @param string $bloqueDosColumnas
     * @return Plantilla
     */
    public function setBloqueDosColumnas(string $bloqueDosColumnas): Plantilla
    {
        $this->bloqueDosColumnas = $bloqueDosColumnas;
        return $this;
    }

    /**
     * @return string
     */
    public function getBloqueTestimonio(): string
    {
        return $this->bloqueTestimonio;
    }

    /**
     * @param string $bloqueTestimonio
     * @return Plantilla
     */
    public function setBloqueTestimonio(string $bloqueTestimonio): Plantilla
    {
        $this->bloqueTestimonio = $bloqueTestimonio;
        return $this;
    }

    /**
     * @return string
     */
    public function getBloqueServicios(): string
    {
        return $this->bloqueServicios;
    }

    /**
     * @param string $bloqueServicios
     * @return Plantilla
     */
    public function setBloqueServicios(string $bloqueServicios): Plantilla
    {
        $this->bloqueServicios = $bloqueServicios;
        return $this;
    }

    /**
     * @return string
     */
    public function getBloquePrecios(): string
    {
        return $this->bloquePrecios;
    }

    /**
     * @param string $bloquePrecios
     * @return Plantilla
     */
    public function setBloquePrecios(string $bloquePrecios): Plantilla
    {
        $this->bloquePrecios = $bloquePrecios;
        return $this;
    }

    /**
     * @return string
     */
    public function getBloqueEmpleados(): string
    {
        return $this->bloqueEmpleados;
    }

    /**
     * @param string $bloqueEmpleados
     * @return Plantilla
     */
    public function setBloqueEmpleados(string $bloqueEmpleados): Plantilla
    {
        $this->bloqueEmpleados = $bloqueEmpleados;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Plantilla
     */
    public function setBody(string $body): Plantilla
    {
        $this->body = $body;
        return $this;
    }


    public function __construct(string $titulo="Sin titulo",string $dirLogotipo='app/Vista/Plantillas/assets/images/logo.png' ,
        array $menu=['Inicio'=>'/','Log-in'=>'login','Registro'=>'#'],
        $encabezadoPrincipal="Sin encabezado",$descripcionPrincipal="Sin descripción"){
        $this->generarEncabezado($titulo);
        $this->generarBarraNavegacion($dirLogotipo,$menu);
        $this->generarPresentacionWeb($encabezadoPrincipal,$descripcionPrincipal);
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
                        <link rel='stylesheet' type='text/css' href='app/Vista/Plantillas/assets/css/bootstrap.min.css'>
                    
                        <link rel='stylesheet' type='text/css' href='app/Vista/Plantillas//assets/css/font-awesome.css'>
                    
                        <link rel='stylesheet' href='app/Vista/Plantillas/assets/css/templatemo-training-studio.css'>
                    
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



    public function generarBarraNavegacion(string $dirLogo,array $opcionesMenu):void{
        $this->nav = "
                    <header class='header-area header-sticky'>
                      <div class='container'>
                          <div class='row'>
                              <div class='col-12'>
                                  <nav class='main-nav'>
                                      <!-- ***** Logo Start ***** -->
                                      
                                     
                                      <a href='index.html' class='logo'> <img src='$dirLogo' width='200px' height='75px'></a>
                                      <!-- ***** Logo End ***** -->
                                      <!-- ***** Menu Start ***** -->
                                      <ul class='nav'>";
                                        foreach ($opcionesMenu as $opcion=>$enlace){
                                            $this->nav.= " <li class='scroll-to-section'><a href='#top' class='active'>".strtoupper($opcion)."</a></li>";
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
    public function generarPresentacionWeb(string $tituloPrincipal, string $descripcion):void{
        $this->bloquePresentacion="
            <section class='header-sec' id='home' >
               <div class='overlay'>
                <div class='container'>
               <div class='row text-center' >
               
                   <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
                   
                    <h2 data-scroll-reveal='enter from the bottom after 0.1s'>
                        <strong>";
        $this->bloquePresentacion.=$tituloPrincipal;
        $this->bloquePresentacion.="               
                            </strong>
                            </h2>
                      <h3 data-scroll-reveal='enter from the bottom after 0.8s'>";
        $this->bloquePresentacion.= $descripcion;
        $this->bloquePresentacion.="</h3>       
                      <br />
                </div>
                   </div>
                    </div>
               </div>
           </section>";
    }

    public function generarServicios():void{
        $this->bloqueServicios="
        
        <section class='features' id='features'>
            <div class='container'>
                <div class='row text-center' >
                    <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
                        <h3 data-scroll-reveal='enter from the bottom after 0.1s'>
                        <strong>Nuestros Servicios</strong>
                        </h3>
                    </div>
                </div>
            <div class='row ' >
                <div class='col-lg-6 col-md-6 col-sm-6' data-scroll-reveal='enter from the left after 0.4s' >
                    <div class='media'>
                        <div class='pull-left'>
                            <i class='fa fa-trophy fa-5x' aria-hidden='true'></i>
                        </div>
                        <div class='media-body'>
                            <h4 class='media-heading'><strong> Pistas de Campeonato </strong></h4>
                            <p>Todas nuestras pistas tienen certificación WPT. Siente el poder de entrenar
                            como un profesional, olvida las lesiones y céntrate en mejorar tu juego.
                            </p>
                        </div>
                    </div>
                </div>
                <div class='col-lg-6 col-md-6 col-sm-6' data-scroll-reveal='enter from the right after 0.7s'>
                    <div class='media'>
                        <div class='pull-left'>
                            <i class='fa fa-medkit fa-5x' aria-hidden='true'></i>
                        </div>
                        <div class='media-body'>
                            <h4 class='media-heading'><strong> Cuidamos de ti </strong></h4>
                            <p>
                            Tenemos servicios de entrenamiento y fisioterapia especialmente diseñados para ti. Todo 
                            lo que necesites para llegar al olimpo del WPT.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        ";
    }

    public function generarPrecios():void{
        $this->bloquePrecios = "
            <section class='price-sec text-center '  id='pricing'>
                <div class='col-lg-6  col-md-6 col-sm-6 single-price' data-scroll-reveal='enter from the left after 0.2s'>
                    <span >2,50 <i class='fa fa-user' aria-hidden='true'></i></span>
                        <h1>PISTA INDIVIDUALES</h1>
                </div>
                <div class='col-lg-6  col-md-6 col-sm-6 multi-price' data-scroll-reveal='enter from the right after 0.2s'>
                    <span >5,50 <i class='fa fa-users' aria-hidden='true'></i></span>
                        <h1>PISTA DOBLES</h1>
                    </div>
            </section>     
        ";


    }

    public function generarTestimonio():void
    {
        $this->bloqueTestimonio="
            <section class='testi-sec' >
                <div class='overlay'>
                    <div class='container'>
                        <div class='row text-center' >
                            <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
                                <h3 data-scroll-reveal='enter from the bottom after 0.1s'>
                                    <strong>Nuestros Valores</strong>
                                </h3>
                                <h4 data-scroll-reveal='enter from the bottom after 0.8s'>
                                    <i class='fa fa-quote-left '></i> 
                                    Nunca es solo pádel con Nostros. Tenemos todo lo necesario para que te sientas como en casa.
                            Avanza con nostros para conseguir tus objetivos en la práctica de nuestro deporte favorito.
                                    <i class='fa fa-quote-right '></i>
                                    <br />
                                    <span class='pull-right'><strong>Miguel A. Tomas</strong></span>
                                </h4>
                                <h6 data-scroll-reveal='enter from the bottom after 1.0s'>
                                    <br />
                                    <br />
                                    <span class='pull-right'><strong>CEO de CobraPadel</strong></span>
                                    <br />
                                    <br />
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
          </section>
        ";

    }

    public function generarEmpleados():void{

        $this->bloqueEmpleados="
        
            <section class='developers' id='developers' >
                <div class='container'>
                    <div class='row text-center' >
                        <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
                            <h3 data-scroll-reveal='enter from the bottom after 0.1s'>
                                <strong>Nuestro Equipo</strong>
                            </h3>
                        </div>
                    </div>
                    <div class='row ' >
                        <div class='col-lg-4 col-md-4 col-sm-4' data-scroll-reveal='enter from the left after 0.2s' >
                            <img src='app/Vistas/Plantillas/assets/images/images.jpg' class='img-rounded img-responsive' alt=''  />
                            <h4 ><strong> Carla Garcia </strong></h4>
                            <i>Directora de Salud</i>
                            <p>Especialista en preparación deportiva. Licenciada en Fisioterapia por la Universidad de Deusto</p>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-4' data-scroll-reveal='enter from the bottom after 0.4s' >
                            <img src='app/Vistas/Plantillas/assets/images/images.jpg' class='img-rounded img-responsive' alt=''  />
                            <h4 ><strong>Gema Hernandez</strong></h4>
                            <i>Vicedirectora de Operaciones</i>
                            <p>Mandamás de la empresa. Estamos aquí para que tu progresión no pare</p>
                        </div>
                        <div class='col-lg-4 col-md-4 col-sm-4' data-scroll-reveal='enter from the right after 0.2s' >
                            <img src='app/Vistas/Plantillas/assets/images/images.jpg' class='img-rounded img-responsive' alt=''  />
                            <h4 ><strong> Carlos Gómez </strong></h4>
                            <i>Director de Desarrollo</i>
                            <p>Padelista profesional desde los 18 años. Licenciado en INEF por la Universidad de Alicante</p>
                        </div>
                    </div>
                </div>
            </section>
        ";


    }


    public function generarDosColumnasConFondoBlanco (string $tituloSeccion,string $celdaIzquierda,string $celdaDerecha):void{

        $this->bloqueDosColumnas="
            <section class='contact' id='contact' >
                <div class='container'>
                   <div class='row text-center ' >
                      <div class='col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1'>
                        <h3 data-scroll-reveal='enter from the bottom after 0.1s'>
                        <strong>";
        $this->bloqueDosColumnas.= $tituloSeccion;
        $this->bloqueDosColumnas.="</strong>
                  </h3>
                 </div>
                 </div>
                <div class='row'>
                     <div class='col-lg-6 col-md-6 col-sm-6' data-scroll-reveal='enter from the right after 0.2s'>";
        $this->bloqueDosColumnas.=$celdaIzquierda;
        $this->bloqueDosColumnas.="
                    </div>
                    <div class='col-lg-6 col-md-6 col-sm-6' data-scroll-reveal='enter from the left after 0.4s'>";
        $this->bloqueDosColumnas.=$celdaDerecha;
        $this->bloqueDosColumnas.="</div>
                </div>
                </div>
              </section>
        ";
    }



    public function generarFooter(){
        $this->footer = "
             
                        <section class='section' id='contact-us'>
                            <div class='container-fluid'>
                                <div class='row'>
                                    <div class='col-lg-6 col-md-6 col-xs-12'>
                                        <div id='map'>
                                          <iframe src='https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed' width='100%' height='600px' frameborder='0' style='border:0' allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class='col-lg-6 col-md-6 col-xs-12'>
                                        <div class='contact-form'>
                                            <form id='contact' action='' method='post'>
                                              <div class='row'>
                                                <div class='col-md-6 col-sm-12'>
                                                  <fieldset>
                                                    <input name='name' type='text' id='name' placeholder='Your Name*' required=''>
                                                  </fieldset>
                                                </div>
                                                <div class='col-md-6 col-sm-12'>
                                                  <fieldset>
                                                    <input name='email' type='text' id='email' pattern='[^ @]*@[^ @]*' placeholder='Your Email*' required=''>
                                                  </fieldset>
                                                </div>
                                                <div class='col-md-12 col-sm-12'>
                                                  <fieldset>
                                                    <input name='subject' type='text' id='subject' placeholder='Subject'>
                                                  </fieldset>
                                                </div>
                                                <div class='col-lg-12'>
                                                  <fieldset>
                                                    <textarea name='message' rows='6' id='message' placeholder='Message' required=''></textarea>
                                                  </fieldset>
                                                </div>
                                                <div class='col-lg-12'>
                                                  <fieldset>
                                                    <button type='submit' id='form-submit' class='main-button'>Send Message</button>
                                                  </fieldset>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
                        <script src='app/Vista/Plantillas//assets/js/jquery-2.1.0.min.js'></script>
                        
                        <!-- Bootstrap -->
                        <script src='app/Vista/Plantillas//assets/js/popper.js'></script>
                        <script src='app/Vista/Plantillas/assets/js/bootstrap.min.js'></script>
                        
                        <!-- Plugins -->
                        <script src='app/Vista/Plantillas/assets/js/scrollreveal.min.js'></script>
                        <script src='app/Vista/Plantillas/assets/js/waypoints.min.js'></script>
                        <script src='app/Vista/Plantillas/assets/js/jquery.counterup.min.js'></script>
                        <script src='app/Vista/Plantillas/assets/js/imgfix.min.js'></script> 
                        <script src='app/Vista/Plantillas/assets/js/mixitup.js'></script> 
                        <script src='app/Vista/Plantillas/assets/js/accordions.js'></script>
                        
                        <!-- Global Init -->
                        <script src='app/Vista/Plantillas/assets/js/custom.js'></script>
                        
                        </body>
                        </html>
        
        ";
    }
    public function generarWebCompleta():string{

        $vista = $this->getEncabezado();
        $vista .= $this->getNav();
        $vista .= $this->getBloquePresentacion();
        if (isset($this->body)){
            $vista .= $this->getBody();
        }
        if (isset($this->bloqueDosColumnas)){
            $vista.= $this->getBloqueDosColumnas();
        }
        if (isset($this->bloqueServicios)){
            $vista.= $this->bloqueServicios;
        }
        if (isset($this->bloqueTestimonio)){
            $vista.=$this->bloqueTestimonio;
        }
        if (isset($this->bloqueEmpleados)){
            $vista.=$this->bloqueEmpleados;
        }
        if (isset($this->bloquePrecios)){
            $vista.=$this->bloquePrecios;
        }
        $vista .= $this->getFooter();

        return $vista;
    }

}