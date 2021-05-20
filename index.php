<?php
    require "includes/conexion.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas Balam</title>
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
    <!--css animate -->
    <link rel="stylesheet" href="assets/cdns/css/animate.min.css">
    <!--css fonawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <!-- ELLEMENTOS FLOTANTES -->
    <div id="menu" class="menu">
        <h2>Menú</h2>
        <i id="flecha" class="fas fa-chevron-down icon-men"></i>
    </div>
    <div id="men-click" class="menu-click">
        <div class="items">
            <ul id="link" class="link">
                <a href="index.php">
                    <li>Inicio</li>
                </a>
                <a href="#nosotros">
                    <li>Nosotros</li>
                </a>
                <a href="#productos">
                    <li>Productos</li>
                </a>
                <a href="#contacto">
                    <li>Contacto</li>
                </a>
            </ul>
        </div>
        <div class="logo wow"></div>
    </div>
    <!-- SOCIALES -->
    <div class="sociales wow animate__animated animate__pulse animate__delay-1s animate__repeat-5">
        <a href="tel:{8715755656}">
            <i class="fas fa-phone-square-alt"><span> (871) 575-56-56</span></i>
        </a>
        <a href="mailto:info@balam.com">
            <i class="fas fa-envelope"><span> info@bicicletasbalam.com</span></i>
        </a>
        <a href="https://www.facebook.com/BicicletasBALAM/" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/bicicletas_balam/" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
    <div class="whatsap wow animate__animated animate__pulse animate__delay-1s animate__infinite">
        <a href="https://wa.link/hlmw87" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <!-- HEADER -->
    <header class="header">
        <div class="img-header wow animate__animated animate__fadeInDown animate__delay-.5s"></div>
        <div class="txt-header wow animate__animated animate__fadeInLeft animate__delay-.8s">
            <h2>Una bicicleta de montaña es como tu mejor amigo</h2>
            <a href="#productos">Ver productos destacados</a>
        </div>
    </header>
    <!-- NOSOTROS -->
    <section id="nosotros" class="caja-nosotros">
        <div class="txt-producto wow animate__animated animate__fadeInDown">
            <h3>Hechas para durar toda la vida</h3>
            <p>Es bueno coseguir algo nuevo, pero si una bicicleta está construida para durar, no hay razón para que no
                pueda tener muchas vidas. Balam, te ofrece las bicicletas de la mejor calidad, cuentan con materiales
                premium, nuevos colores y alto nivel de rendimiento.</p>
            <a href="#productos">Ver bicicletas</a>
        </div>
        <div class="caja-bicis"></div>
        <div class="caja-accesorios"></div>
        <div class="txt-producto wow animate__animated animate__fadeInDown">
            <h3>Rendimiento y comodidad</h3>
            <p>El rendimiento de una bicicleta de pista con la comodidad de una bicicleta de montaña. Excelencia en
                ingeniería para uso diario.</p>
            <a href="#productos">Ver bicicletas</a>
        </div>
    </section>
    <!-- Nuestros Productos -->
    <section id="productos" class="galeria">
        <div class="titulo">
            <h2>Nuestros Productos</h2>
        </div>
        <div class="filtro">
            <select name="categoría" id="categoria" onchange="filtroCategorias();">
                <option>Selecciona una categoría</option>
                <option value="todos">Todos</option>
                <option value="bicicletas">Bicicletas</option>
                <option value="accesorios">Accesorios</option>
            </select>
        </div>
        <div class="gal-img wow animate__animated animate__fadeInLeft">
            <div id="caja-bicis" class="bicicletas">
                <?php 
                /* <?php 
                                               $url_vacia = "";
                                               if($infoImg["url_amazon"] != "") {
                                                   $url_vacia = $infoImg["url_amazon"];
                                               } */
                    $consulta = $con->query("SELECT * FROM productos WHERE nombre_cat = 'bicicletas' ");
                    while ($infoImg = mysqli_fetch_array($consulta)) { ?>
                <div class="img">
                    <img class="img-prod" lazy="loading" src="assets/images/<?= $infoImg["url_foto"]?>"
                        alt="Galeria de balam">
                    <div class="caja-hover">
                        <h3><?= $infoImg["nombre"]?></h3>
                        <p><?= $infoImg["precio"]?></p>
                        <div class="caja-compra">
                            <p>Compralo por:</p>
                            <div class="botones">
                                <a class="mercado" target="_blank" href="<?= $infoImg["url_mercado_libre"]?>"></a>
                                <a class="amazon" target="_blank" href="<?= $infoImg["url_amazon"]?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="info-movil">
                        <h3><?= $infoImg["nombre"]?></h3>
                        <p><?= $infoImg["precio"]?></p>
                        <div class="caja-compra">
                            <p>Compralo por:</p>
                            <div class="botones">
                                <a class="mercado" target="_blank" href="<?= $infoImg["url_mercado_libre"]?>"></a>
                                <a class="amazon" target="_blank" href="<?= $infoImg["url_amazon"]?>"></a>
                            </div>
                        </div>
                    </div>
                </div><?php 
                    }
                ?>
            </div>
            <div id="caja-accesorios" class="accesorios">
                <?php  
                    /* <?php 
                                                $url_vacia = "";
                                                if($infoImg["url_amazon"] != "") {
                                                    $url_vacia = $infoImg["url_amazon"];
                                                } */
                    $consulta = $con->query("SELECT * FROM productos WHERE nombre_cat = 'accesorios' ");
                    while ($infoImg = mysqli_fetch_array($consulta)) { ?>
                <div class="img">
                    <img class="img-prod" lazy="loading" src="assets/images/<?= $infoImg["url_foto"]?>"
                        alt="Galeria de balam">
                    <div class="caja-hover">
                        <h3><?= $infoImg["nombre"]?></h3>
                        <p><?= $infoImg["precio"]?></p>
                        <div class="caja-compra">
                            <p>Compralo por:</p>
                            <div class="botones">
                                <a class="mercado" target="_blank" href="<?= $infoImg["url_mercado_libre"]?>"></a>
                                <a class="amazon" target="_blank" href="<?= $infoImg["url_amazon"]?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="info-movil">
                        <h3><?= $infoImg["nombre"]?></h3>
                        <p><?= $infoImg["precio"]?></p>
                        <div class="caja-compra">
                            <p>Compralo por:</p>
                            <div class="botones">
                                <a class="mercado" target="_blank" href="<?= $infoImg["url_mercado_libre"]?>"></a>
                                <a class="amazon" target="_blank" href="<?= $infoImg["url_amazon"]?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <div id="contacto" class="ubicacion ">
        <p>Ubicación</p>
        <img src="assets/img/direccion.png" alt="Direccion Balam">
    </div>
    <!-- Contacto-->
    <section class="contacto">
        <div class="form">
            <h2>Contáctanos</h2>
            <form id="enviar-correo" method="POST" class="campos">
                <label for=" ">Nombre:</label>
                <input autocomplete="off" type="text " name="nombre" id="nombre" placeholder="Ingresa tu nombre">
                <label for=" ">Correo:</label>
                <input autocomplete="off" type="email " name="correo" id="correo"
                    placeholder="Ingresa tu correo electrónico">
                <label for=" ">Mensaje:</label>
                <textarea autocomplete="off" name="mensaje" id="mensaje" cols="30 " rows="10 "
                    placeholder="Mensaje "></textarea>
                <button type="button" id="enviar">Enviar</button>
            </form>
        </div>
    </section>
    <div id="error" class="error">
        <i class="fas fa-exclamation"></i>
        <p id="mensaje-alerta"></p>
    </div>
    <div id="exito" class="exito">
        <i class="far fa-thumbs-up"></i>
        <p id="mensaje-alerta">Se ha enviado tu información correctamente.</p>
    </div>
    <!-- Footer-->
    <footer class="footer ">
        <h2>Desarrollado por <span><a href=" ">A W Software</a></span></h2>
    </footer>
    <script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="assets/cdns/js/queryWow.js "></script>
    <script src="assets/cdns/js/wow.js "></script>
</body>

</html>