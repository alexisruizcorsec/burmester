<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

session_start();
session_destroy();


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOM035</title>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/animate.css">
    <style>
        html, body{
            margin: 0px;
            padding: 0px;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            color: #343A41;
        }
        #main-wrapper{
            min-height: 100%;
            position: relative;
        }
        body{
        background: #2C2422;
        /* background: url(img/fondo.png) no-repeat center center fixed; AQUÍ FONDO DE PAGINA DE INICIO */
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
        article{
            background-color: rgba(255, 255, 255, 1);
            border-radius: 8px;
            width: 90%;
            max-width: 450px;
            height: 400px;
            position: absolute;
            margin: auto;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            overflow: auto;
            
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;

            justify-content: center;
            align-items: center;
        }
        .inputLogin{
            border: 1px #003E5E solid;
            background-color: rgba(255, 255, 255, .0);
            height: 50px;
            width: 100%;
            border-radius: 5px;
        }
        .inputLogin, ::placeholder{
            padding-left: 10px;
            font-size: 1.1em;
        }
        .tabla{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;

            justify-content: center;
            align-items: center;
        }
        .boton{
            background-color: rgba(255, 255, 255, .0);
            border: 1px #343A41 solid;
            font-size: 1.3em;
            color: #343A41;
            padding: 10px;
            cursor:pointer;
            border-radius: 5px;
        }
        .boton:hover{
            background-color: #343A41;
            color: #FFF;
            transition-duration: .2s;
        }

        p{
            color: #646569;
        }

    </style>
</head>
<body>
    <div id="main-wrapper">
        <article class="animated fadeIn">
            <form action="validaDos/valida.aspx" method="POST">
            
                <table style="width: 90%; max-width: 440; padding: 20px; margin: auto;">
                    <tr>
                        <td style="text-align: center;">
                            <img src="img/logo.png" alt="LOGO" style="width: 90%;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Nombre del colaborador:</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <img src="img/login.svg" style="margin: 5px 3px 0px 0px; height: 1.5em;">
                                    </td>
                                    <td style="width: 350px;">
                                        <input type="text" name="txtUsr" class="inputLogin" placeholder="NOMBRE"  minlength=5 id="autoEmpleado" required style="text-transform: uppercase;"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: .85em;">Para continuar ingresa el nombre del colaborador.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">
                            <input type="submit" value="Continuar" class="boton">
                        </td>
                    </tr>
                </table>
            </form>

        </article>

        
    </div>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/info.js"></script>
    <script>
        $( "#autoEmpleado" ).autocomplete({
            source: "autoEmpleado/auto.aspx"
        });
    </script>
    
</body>
</html>