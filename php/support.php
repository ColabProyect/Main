<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BusinessWeb - Soporte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="container">

        <!-- Código php -->
        <?php 
            #Cuando se pulse el botón enviar 
            if(isset($_POST["buttonSubmit"])){
                # Conexión con la base de datos
                $conexionSql = new mysqli("localhost", "root", "", "businessWeb");
                mysqli_set_charset($conexionSql, 'utf8');
                
                #Si la conexión se establece correctamente
                if($conexionSql){
                    #Se capturan los datos de los campos
                    $name    = $_POST["name"];
                    $email   = $_POST["email"];
                    $message = $_POST["message"];

                    /* Creamos una sentencia preparada para 
                       evitar las inyecciones SQL */
                    $insertarDatos = "INSERT INTO supportuser (name, email, message) VALUES (?,?,?)";
                    $stmt  = $conexionSql->prepare($insertarDatos);

                    #Si la consulta SQL es correcta
                    if($stmt){
                        #Enlazamos parámetros
                        $stmt->bind_param("sss", $name, $email, $message);

                        #Ejecutamos la consulta
                        $stmt->execute();
                        $msgOutput = "";
                        
                        #Cerramos la sentencia
                        $stmt->close();

                        #Configuración del correo electrónico
                        $destino_a= "alexisdominguezsanchez3@gmail.com"; 
                        $asunto_a= "BusinesWeb - Contacto."; 
                        $mensaje_a= "<html>"
                                    ."<head><title>BusinessWeb - Soporte</title></head>"
                                    ."<body><h2>Sitema de correos de BusinessWeb</h2>"
                                    ."<h3>Mensaje de: " . $name ."</h3>" 
                                    ."<p>". $message ."</p>"
                                    ."<h3>Información de contacto del cliente:</h3>"
                                    ."<strong>Correo electrónico: </strong>". $email
                                    ."</body>"
                                    ."</html>";
                        $encabezado_a = 'MIME-Version: 1.0' . "\r\n"; 
                        $encabezado_a .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        $encabezado_a .= "De: " . $email; 
                        mail($destino_a, $asunto_a , $mensaje_a,$encabezado_a ) or die ("Su mensaje no se envio."); 
                    }else{
                        #Si hay un error al preparar la consulta
                        $msgOutput = "Error preparando la consulta";
                    }
                    #Cerramos la conexión
                    $conexionSql->close();
                }else{
                    #Si no se puede conectar con la base de datos
                    $msgOutput = "Error, no se pudo conectar con la base de datos";
                }
            }else{
                #Si hay un error al capturar los datos
                $msgOutput = "No se postearon los datos correctamente";
            }
        echo $msgOutput;
        ?><!-- Fin código php -->

    </div>
</body>
</html>