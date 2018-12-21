<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BusinessWeb: Marketing y Páginas web para su negocio</title>
    <meta name="description" content="Contacte con el equipo de BusinessWeb y obtenga información obre los servicios que se ofrece.">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/header2.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style-contact.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../icomoon/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../flags/flags.css" />
    <link rel="stylesheet" href="text/css" media="screen" href="../css/footer.css" />
    <link type="image/x-icon" href="favicon.ico" rel="icon" />
    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
    <script src="../javascript/jquery-3.3.1.min.js"></script>
    <script src="../javascript/contact.js"></script>
    <script src="../javascript/responsiveMenu.js"></script>
</head>
<body>
    <div class="container">
<!-- header-->
        <header class="header">
            <a href="../index.html"><div class="nameWebSite"></div></a>
            <div class="headerButtonsContainer">
                <div class="headerButton"><a href="../contact.html"><span class="icon-mail2"></span> Contacto</a></div>
                <div class="headerButton"><a href="../team.html"><span class="icon-users"></span> Equipo</a></div>
                <div class="headerButton"><a href="../prices.html"><span class="icon-price-tags"></span> Precios</a></div>
                <div class="headerButton"><a href="../services.html"><span class="icon-earth"></span> Servicios</a></div>
            </div>
            <div class="headerButtonsContainerResponsive">
                <span class="icon-list2 listButton"></span>
                <nav>
                    <ul>
                        <a href="../services.html"><li><span class="icon-earth"></span> Servicios</li></a>
                        <a href="../prices.html"><li><span class="icon-price-tags"></span> Precios</li></a>
                        <a href="../team.html"><li><span class="icon-users"></span> Equipo</li></a>
                        <a href="../contact.html"><li><span class="icon-mail2"></span> Contacto</li></a>
                    </ul>
                </nav>
            </div>
        </header> <!-- Fin de header-->

        <div class="mainPanel mainPanelPHP">
            <div class="frase frasePHP">
                <span class="uppercase">Datos enviados con éxito</span> <br>
                Gracias por colaborar con nosotros
            </div>
        </div>

        <?php
            if(isset($_POST['buttonSubmit'])){
                $conexionSql = new mysqli("localhost", "root", "", "businessWeb");
                mysqli_set_charset($conexionSql, 'utf8');
                if($conexionSql){
                    $name = $_POST["name"];
                    $phoneNumber = $_POST["phoneNumber"];
                    $email = $_POST["email"];
                    $message = $_POST["message"];
                    /* crear una sentencia preparada */
                    $insertarDatos = "INSERT INTO contactUser (name,phoneNumber,email, message) VALUES (?,?,?,?)";
                    $stmt = $conexionSql->prepare($insertarDatos);
                    if ($stmt) {
                        $stmt->bind_param("ssss", $name, $phoneNumber, $email, $message);
                        /* ejecutar la consulta */
                        $stmt->execute();
                        $msgOutput="";
                        /* cerrar sentencia */
                        $stmt->close();

                        /* Configuración del correo electrónico */
                        $destino_a= "alexisdominguezsanchez3@gmail.com"; 
                        $asunto_a= "BusinesWeb - Contacto."; 
                        $mensaje_a= "<html>"
                                    ."<head><title>BusinessWeb - Contacto</title></head>"
                                    ."<body><h2>Sitema de correos de BusinessWeb</h2>"
                                    ."<h3>Mensaje de: " . $name ."</h3>" 
                                    ."<p>". $message ."</p>"
                                    ."<h3>Información de contacto del cliente:</h3>"
                                    ."<strong>Número de teléfono: </strong>". $phoneNumber ."<br>"
                                    ."<strong>Correo electrónico: </strong>". $email
                                    ."</body>"
                                    ."</html>";
                        $encabezado_a = 'MIME-Version: 1.0' . "\r\n"; 
                        $encabezado_a .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        $encabezado_a .= "De: " . $email; 
                        mail($destino_a, $asunto_a , $mensaje_a,$encabezado_a ) or die ("Su mensaje no se envio."); 

                    } else {
                        $msgOutput="Error preparando la consulta: ".$conexionSql->error;
                    }
                    /* cerrar conexión */
                    $conexionSql->close();
                } else {
                    $msgOutput="Error, no se pudo conectar a la base de datos: ".$conexionSql->connect_error;
                }
            } else {
                $msgOutput="No se postearon los datos correctamente";
            }
            echo $msgOutput;
        ?>

        <footer>
            <div class="infocontainer">
                <div class="contact">
                    <div class="infotext">Puede contactarnos en las siguientes redes:</div>
                    <ul>
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Google</a></li>
                        <li><a href="">Instagram</a></li>
                        <li><a href="">Twitter</a></li>
                        <li><a href="">Youtube</a></li>
                    </ul>
                </div>
                <div class="information">
                    <div class="infotext">Información general:</div>
                    <ul>
                        <li><a href="">Soporte</a></li>
                        <li><a href="">FAQ's</a></li>
                        <li><a href="">Acerca de BusinessWeb</a></li>
                    </ul>
                </div>
                <div class="policies">
                    <div class="infotext">Políticas:</div>
                    <ul>
                        <li><a href="">Políticas de privacidad</a></li>
                        <li><a href="">Derechos de autor</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">© 2018 BusinessWeb</div>
        </footer><!-- Fin footer -->
    </div>
</body>
</html>