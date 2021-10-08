<?php

#El index: En el mostraremos la salida de las vistas de usuario y tambien a traves de el enviaremos las distintas acciones que el usuario envie al controlador.

#require() establece que el codigo del archivo invocado es requi

#require_once() funcionan de la misma forma que sus respectivos, salvo que al utilizar la vervison _once se le impide la carga de un mismo archivo a mas de una vez.
#Si requerimos el mismo coddigo mas de una vez corremos el riesgo de redeclaracion de variables, funciones o clases.

require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.controlador.php";
require_once "modelos/formularios.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();

?>